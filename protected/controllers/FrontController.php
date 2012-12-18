<?php

class FrontController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionOrderForm()
	{
		$this->render('order_form');
	}
	
	public function actionUserPayment()
	{
		$option_data = Room::makeOptionData();
		
		$bUserProccessed = false;
		$user_info = null;
		$post_array = $_POST['User'];
		$id_product_array = $_POST['id_product_array'];
		$id_product_date_array = $_POST['id_product_date_array'];
		$id_bedding_array = $_POST['options'];
		
		//var_dump($id_product_date_array);
		if(isset($_POST['id_user']) && $_POST['id_user'] != null) {
			$bUserProccessed = true;
			$user_info = User::model()->findByPk($_POST['id_user']);
		} else {
			$address_info = new Address();
			$address_info->id_country = 24;
// 			$address_info->firstname = $_POST['firstname'][array_pop($id_product_array)];//$post_array['firstname'];
// 			$address_info->lastname = $_POST['lastname'][array_pop($id_product_array)];//$post_array['lastname'];
			$address_info->firstname = $_POST['User']['firstname'];
			$address_info->lastname = $_POST['User']['lastname'];
			$address_info->address1 = "empty";
			$address_info->city = "sydney";
			
			if($address_info->save()) {
				$user_model = new User();
				
				$user_model->id_group = User::CUSTOMER;
				$user_model->id_lang = 1; //English.
				$user_model->id_address_default = $address_info->id_address;
				$user_model->id_address_delivery = $address_info->id_address;
				$user_model->id_address_invoice = $address_info->id_address;
				$user_model->firstname = $address_info->firstname;
				$user_model->lastname = $address_info->lastname;
				$user_model->email = $post_array['email'];
				$user_model->passwd = $post_array['passwd'];
				$user_model->repeat_passwd = $post_array['repeat_passwd'];
				$user_model->is_guest = 1;
				$user_model->active = 1;
				
				if($user_model->save()) {
					$bUserProccessed = true;
					$user_info = $user_model;
				} else {
					echo "user_model->save error:";
					print_r($user_model->getErrors());
				}
			} else {
				echo "address_info->save error:";
				print_r($address_info->getErrors());
			}
		}
		
		$bCartProccessed = false;
		if($bUserProccessed) {
			$newCart = new Cart();
			
			$newCart->id_currency = 1;	//	AUD.
			$newCart->id_user = $user_info->id_user;
			$newCart->id_address_delivery = $user_info->id_address_delivery;
			$newCart->id_address_invoice = $user_info->id_address_invoice;
			
			if($newCart->save()) {
				$cart_booking = "";
				//$bFirst = true;
				foreach($id_bedding_array as $id_product => $id_bedding) {
					$cart_booking = new CartBooking();
					$cart_booking->id_cart = $newCart->id_cart;
					$cart_booking->id_product = $id_product;
					$cart_booking->id_bedding = $id_bedding;
					$cart_booking->booking_name = $_POST['booking_name'][$id_product];
					
					if($cart_booking->save()){
						$bCartProccessed = true;
					} else {
						$bCartProccessed = false;
						echo "cart_booking->save error";
						print_r($cart_booking->getErrors());
					}

					$bookin_date_id = "";
					$bookout_date_id = "";
					//if($bFirst) {
						$loop_num = 1;
						foreach($id_product_date_array as $id_product_date => $id_product_2) {
							if($id_product == $id_product_2) {
								$cart_product = new CartProduct();
								
								$cart_product->id_cart_booking = $cart_booking->id_cart_booking;
								$cart_product->id_product = $id_product_2;//$_POST['id_product'];
								$cart_product->id_product_date = $id_product_date;
								$cart_product->id_cart = $newCart->id_cart;
								$cart_product->quantity = 1;//$_POST['quantity'];
								
								if(isset($option_data[$cart_product->id_product])) {
									/*
									 {
										name : $name,
										adults_num : $adults_num,
										children_num : $children_num,
										adults_extra : $adults_extra,
										children_extra : $children_extra,
										extra_price : $extra_price,
										bedding : {
											id_bedding : $id_bedding,
											bed_index : $bed_index,
											bed_num : $bed_num,
											single_num: $single_num,
											double_num : $double_num,
											additional_cost: $additional_cost
										},
										product_date : [{
											id_product_date: $id_product_date,
											on_date : 'yyyy-MM-dd',
											price : $price,
											agent_price: $agent_price,
											extra_price : $extra_price										
										}, ... ],
										total_price : $total_price,
										total_agent_price : $total_agent_price,
									}
									 */
									
									$option = $option_data[$cart_product->id_product];									
									unset($option['product_date']);
									unset($option['total_price']);
									unset($option['total_agent_price']);
									
									$optionStr = json_encode($option);
									$cart_product->option_data = $optionStr;
									echo $optionStr;
								}
								
								if($cart_product->save()) {
									$bCartProccessed = true;
								} else {
									$bCartProccessed = false;
									echo "cart_product->save error";
									print_r($cart_product->getErrors());
								}
								
								if($loop_num == 1) {
									$bookin_date_id = $id_product_date;
								}
								
								$loop_num++;
								$bookout_date_id = $id_product_date;
							}
						}
					//}
					
					$cart_booking->bookin_date = ProductDate::model()->findByPk($bookin_date_id)->on_date;
					$cart_booking->bookout_date = ProductDate::model()->findByPk($bookout_date_id)->on_date;
					$cart_booking->save();
					
					//$bFirst = false;
				}
			} else {
				echo "newCart->save error";
				print_r($newCart->getErrors());
			}
		}
		
		if($bUserProccessed && $bCartProccessed) {
			//$this->redirect(array('/paypal/process', 'id_cart'=>$newCart->id_cart));
		} else {
			echo "save error in the end of it.";
		}
	}
}

