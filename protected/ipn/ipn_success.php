<?php
/*
 * ipn_success.php
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
//include file - not accessible directly
if(isset($paypal['custom'])) {
	//log successful transaction to file or database
	$order = Order::model()->findByPk($paypal['custom']);
	
	$model->id_user = $order->id_user;
	$model->id_order = $order->id_order;
	$model->id_order_state = "11"; //Awaiting PayPal payment.
	$model->date_add = $_POST['payment_date'];
		
	$model->save();
} else {
	die('This page is not directly accessible');
}
?>