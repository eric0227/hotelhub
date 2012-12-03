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
$paypal[business]="accoun_1340070325_biz@gnaemarketing.com.au";//"seller_1348028137_biz@gmail.com";//
$paypal[site_url]="http://hotelhub.localhost";//"14.200.134.156/";//
$paypal[image_url]="";
$paypal[success_url]="/paypal/Success/";
//$paypal[success_url]="php_paypal/ipn/ipn";
$paypal[cancel_url]="/paypal/Cancelled/";
$paypal[notify_url]="/paypal/ipn/ipn/";
$paypal[return_method]="2"; //1=GET 2=POST
$paypal[currency_code]="AUD"; //[USD,GBP,JPY,CAD,EUR]
$paypal[lc]="AU";

//$paypal[url]="http://www.paypal.com/cgi-bin/webscr";
//$paypal[url]="https://www.paypal.com/cgi-bin/webscr";
$paypal[url]="https://www.sandbox.paypal.com/cgi-bin/webscr";
$paypal[post_method]="fso"; //fso=fsockopen(); curl=curl command line libCurl=php compiled with libCurl support
$paypal[curl_location]="C:/xampp/htdocs/hotelhub/curl/curl.exe";//"/usr/local/bin/curl";

$paypal[bn]="toolkit-php";
$paypal[cmd]="_xclick";//"_express-checkout";//

//Payment Page Settings
$paypal[display_comment]="0"; //0=yes 1=no
$paypal[comment_header]="Comments";
$paypal[continue_button_text]="Continue >>";
$paypal[background_color]=""; //""=white 1=black
$paypal[display_shipping_address]=""; //""=yes 1=no
$paypal[display_comment]="1"; //""=yes 1=no


//Product Settings
$paypal[item_name]=$_POST[item_name];
$paypal[item_number]=$_POST[item_number];
$paypal[amount]=$_POST[amount];
$paypal[on0]=$_POST[on0];
$paypal[os0]=$_POST[os0];
$paypal[on1]=$_POST[on1];
$paypal[os1]=$_POST[os1];
$paypal[quantity]=$_POST[quantity];
$paypal[edit_quantity]=""; //1=yes =no
$paypal[invoice]=$_POST[invoice];
$paypal[tax]=$_POST[tax];

//Shipping and Taxes
$paypal[shipping_amount]=$_POST[shipping_amount];
$paypal[shipping_amount_per_item]="";
$paypal[handling_amount]="";
$paypal[custom_field]="";

//Customer Settings
$paypal[firstname]=$_POST[firstname];
$paypal[lastname]=$_POST[lastname];
$paypal[address1]=$_POST[address1];
$paypal[address2]=$_POST[address2];
$paypal[city]=$_POST[city];
$paypal[state]=$_POST[state];
$paypal[zip]=$_POST[zip];
$paypal[email]=$_POST[email];
$paypal[phone_1]=$_POST[phone1];
$paypal[phone_2]=$_POST[phone2];
$paypal[phone_3]=$_POST[phone3];
?>