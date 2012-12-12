<?php
/*
 * config.inc.php
 *
 * PHP Toolkit for PayPal v0.51
 * http://www.paypal.com/pdn
 *
 * Copyright (c) 2004 PayPal Inc
 *
 * Released under Common Public License 1.0
 * http://opensource.org/licenses/cpl.php
 *
 */
	
	//Configuration Settings
	$paypal[business] = "accoun_1340070325_biz@gnaemarketing.com.au";//"seller_1348028137_biz@gmail.com";//
	if(true) {	//	Local Server.
		$paypal[site_url] = "http://hotelhub.localhost".Yii::app()->baseUrl;
	} else {	// Test Server.
		$paypal[site_url] = "http://14.200.134.156".Yii::app()->baseUrl;
	}
	$paypal[image_url] = "";
	$paypal[success_url] = "/paypal/Success/";
	//$paypal[success_url] = "php_paypal/ipn/ipn";
	$paypal[cancel_url] = "/paypal/Cancelled/";
	$paypal[notify_url] = "/paypal/Ipnsuccess";
	$paypal[return_method] = "2"; //1=GET 2=POST
	$paypal[currency_code] = "AUD"; //[USD,GBP,JPY,CAD,EUR]
	$paypal[lc] = "AU";
	
	$paypal[is_test] = true;	//true: sandbox, false: real transation.
	if($paypal[is_test]) {	//	Paypal Sandbox.
		$paypal[url] = "https://www.sandbox.paypal.com/cgi-bin/webscr";
	} else {	//	Paypal Real.
		$paypal[url] = "https://www.paypal.com/cgi-bin/webscr";
	}
	$paypal[post_method] = "fso"; //fso=fsockopen(); curl=curl command line libCurl=php compiled with libCurl support
	$paypal[curl_location] = "C:/curl/curl.exe";//"/usr/local/bin/curl";
	
	$paypal[bn] = "toolkit-php";
	$paypal[cmd] = "_xclick";//"_express-checkout";//
	
	//Payment Page Settings
	$paypal[comment_header] = "Comments";
	$paypal[continue_button_text] = "Continue >>";
	$paypal[background_color] = ""; //""=white 1=black
	$paypal[display_shipping_address] = ""; //""=yes 1=no
	$paypal[display_comment] = "1"; //""=yes 1=no
	
	
	//Product Settings
	$paypal[item_name] = $product_model->name."(Order No:".$order_model->id_order.")";
	$paypal[item_number] = "";//$cartproduct_model->id_product;
	$paypal[amount] = $order_model->payment;
	$paypal[on0] = "";
	$paypal[os0] = "";
	$paypal[on1] = "";
	$paypal[os1] = "";
	$paypal[quantity] = "1";//$cartproduct_model->quantity;
	$paypal[edit_quantity] = ""; //1=yes =no
	$paypal[invoice] = "";
	$paypal[tax] = "";
	
	//Shipping and Taxes
	$paypal[shipping_amount] = "";
	$paypal[shipping_amount_per_item] = "";
	$paypal[handling_amount] = "";
	$paypal[custom_field] = $order_model->id_order;
	
	//Customer Settings
	$paypal[firstname] = $user_model->firstname;
	$paypal[lastname] = $user_model->lastname;
	$paypal[address1] = "";
	$paypal[address2] = "";
	$paypal[city] = "";
	$paypal[state] = "";
	$paypal[zip] = "";
	$paypal[email] = $user_model->email;
	$paypal[phone_1] = "";
	$paypal[phone_2] = "";
	$paypal[phone_3] = "";
?>