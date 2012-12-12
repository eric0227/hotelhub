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
		$bUserProccessed = false;
		$user_info = null;
		$post_array = $_POST['User'];
		if(isset($_POST['id_user']) && $_POST['id_user'] != null) {
			$bUserProccessed = true;
			$user_info = User::model()->findByPk($_POST['id_user']);
		} else {
			$address_info = new Address();
			$address_info->id_country = 24;
			$address_info->firstname = $post_array['firstname'];
			$address_info->lastname = $post_array['lastname'];
			$address_info->address1 = "empty";
			$address_info->city = "sydney";
			
			if($address_info->save()) {
				$user_model = new User();
				
				$user_model->id_group = User::CUSTOMER;
				$user_model->id_lang = 1; //English.
				$user_model->id_address_default = $address_info->id_address;
				$user_model->id_address_delivery = $address_info->id_address;
				$user_model->id_address_invoice = $address_info->id_address;
				$user_model->firstname = $post_array['firstname'];
				$user_model->lastname = $post_array['lastname'];
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
		
		if($bUserProccessed) {
			$newCart = new Cart();
			
			$newCart->id_currency = 1;	//	AUD.
			$newCart->id_user = $user_info->id_user;
			$newCart->id_address_delivery = $user_info->id_address_delivery;
			$newCart->id_address_invoice = $user_info->id_address_invoice;
			
			if($newCart->save()) {
				$cart_product = new CartProduct();
				
				$cart_product->id_product = $_POST['id_product'];
				$cart_product->id_cart = $newCart->id_cart;
				$cart_product->quantity = $_POST['quantity'];
				
				if($cart_product->save()) {
					//$this->render('/paypal/process');
					$this->redirect(array('/paypal/process', 'id_cart'=>$newCart->id_cart));
				} else {
					echo "cart_product->save error";
					print_r($cart_product->getErrors());
				}
			} else {
				echo "newCart->save error";
				print_r($newCart->getErrors());
			}
		}
	}
}

