<?php
	
class PaypalController extends Controller
{
	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		$id_supplier = $_GET['id'];
		if(!isset($id_supplier)) {
			$id_supplier = $_POST['Supplier']['id_supplier'];
		}
			
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'orderform', 'process', 'success', 'cancelled', 'ipnsuccess'),
					'users' => "*",
				),
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionProcess() {
		$model = new Order;
		
		if(isset($_POST['id_cart'])) {
			$id_cart = $_POST['id_cart'];

			$model->id_lang = Lang::getCurrentLang();
		
			// get Cart
			$cart = Cart::model()->findByPk($id_cart);
			$model->id_cart = $id_cart;
			$model->id_user = $cart->id_user;
			$model->id_currency = $cart->id_currency;
			$model->id_address_delivery = $cart->id_address_delivery;
			$model->id_address_invoice = $cart->id_address_invoice;
				
			$model->procOrder();
			if($model->save()) {
				$_POST[custom_field] = $model->id_order;
				$this->render('process');
			} else {
				die();
			}
		}
	}
	
	public function actionOrderform() {
		$this->render('orderform');
	}
	
	public function actionSuccess() {
		$this->render('success');
	}	
	
	public function actionCancelled() {
		$this->render('cancelled');
	}
	
	public function actionPayment() {
		$this->render('payment');
	}
	
	public function actionIpnsuccess() {
		$this->layout=null;
		
		$raw_post_data = file_get_contents('php://input');
		$raw_post_array = explode('&', $raw_post_data);
		$myPost = array();
		foreach ($raw_post_array as $keyval) {
		  $keyval = explode ('=', $keyval);
		  if (count($keyval) == 2)
			 $myPost[$keyval[0]] = urldecode($keyval[1]);
		}

		// read the post from PayPal system and add 'cmd'
		$req = 'cmd=_notify-validate';
		if(function_exists('get_magic_quotes_gpc')) {
		   $get_magic_quotes_exists = true;
		} 

		foreach ($myPost as $key => $value) {        
		   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
				$value = urlencode(stripslashes($value)); 
		   } else {
				$value = urlencode($value);
		   }
		   $req .= "&$key=$value";
		}
	 
	 
		// STEP 2: Post IPN data back to paypal to validate
		 
		//$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
		$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
		
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
		 
		// In wamp like environments that do not come bundled with root authority certificates,
		// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
		// of the certificate as shown below.
		// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
		if( !($res = curl_exec($ch)) ) {
			error_log("Got " . curl_error($ch) . " when processing IPN data");
			curl_close($ch);
			exit;
		}
		curl_close($ch);
		 
		 
		// STEP 3: Inspect IPN validation result and act accordingly
		 
		if (strcmp ($res, "VERIFIED") == 0) {
			// check whether the payment_status is Completed
			// check that txn_id has not been previously processed
			// check that receiver_email is your Primary PayPal email
			// check that payment_amount/payment_currency are correct
			// process payment
		 
			// assign posted variables to local variables
			$item_name = $_POST['item_name'];
			$item_number = $_POST['item_number'];
			$payment_status = $_POST['payment_status'];
			$payment_amount = $_POST['mc_gross'];
			$payment_currency = $_POST['mc_currency'];
			$txn_id = $_POST['txn_id'];
			$receiver_email = $_POST['receiver_email'];
			$payer_email = $_POST['payer_email'];
			
			
			$id = $_POST['custom'];
			$order = Order::model()->findByPk($id);
			
			$orderHistory = new OrderHistory;
			$orderHistory->id_order = $id;
			
			$orderState = OrderState::model()->findByAttributes(array('template'=>strtolower($payment_status)));
			$orderState_value = 8;
			if($orderState != null) {
				$orderState_value = $orderState->id_order_state;
			}
			$orderHistory->id_user = $order->id_user;
			$orderHistory->id_order = $order->id_order;
			$orderHistory->id_order_state = $orderState_value;
			$orderHistory->comment = "txn_id:".$txn_id."\r\n"."original_paypal_state:".$payment_status;
			$orderHistory->save();
			
			$order->id_order_state = $orderHistory->id_order_state;
			$order->save();
			
		} else if (strcmp ($res, "invalid") == 0) {
			// log for manual investigation
		}

		Yii::app()->end();
	}
}