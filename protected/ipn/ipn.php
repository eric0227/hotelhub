<?php
/*
 * ipn.php
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
	
	//get pay pal configuration file
	include_once(Yii::app()->baseUrl.'/includes/config.inc.php');

	//get global configuration information
	include_once(Yii::app()->baseUrl.'/includes/global_config.inc.php');
	
	
	//$date = date("H:i dS F"); //Get the date and time.
	//$file = "./log.htm"; //Where the log will be saved.
	
	//$open = fopen($file, "a+"); //open the file, (log.htm).
	
	// STEP 1: Read POST data
	
	// reading posted data from directly from $_POST causes serialization
	// issues with array data in POST
	// reading raw POST data from input stream instead.
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
	$ch = curl_init($paypal[url]);
	
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
	} else if (strcmp ($res, "INVALID") == 0) {
		// log for manual investigation
	}
	
	
	
	/*
	fwrite($open, "<b>date:</b>".$date."<br/>");
	fwrite($open, "<b>RESULTS:</b>".$res."<br/>");
	
	fwrite($open, "<b>item_name:</b>".$item_name."<br/>");
	fwrite($open, "<b>item_number:</b>".$item_number."<br/>");
	fwrite($open, "<b>payment_status:</b>".$payment_status."<br/>");
	fwrite($open, "<b>payment_amount:</b>".$payment_amount."<br/>");
	fwrite($open, "<b>payment_currency:</b>".$payment_currency."<br/>");
	fwrite($open, "<b>txn_id:</b>".$txn_id."<br/>");
	fwrite($open, "<b>receiver_email:</b>".$receiver_email."<br/>");
	fwrite($open, "<b>payer_email:</b>".$payer_email."<br/><br/>");
	
	fclose($open); // you must ALWAYS close the opened file once you have finished.
	*/
	
	//check the ipn result received back from paypal
	
	if (strcmp ($res, "VERIFIED") == 0) {
		include_once('./ipn_success.php');
	} else {
		include_once('./ipn_error.php');
	}
?>


