<?php
	//var_dump($_POST);
	$booking_datas = isset($_POST['booking']) ? $_POST['booking'] : array();
	foreach ($booking_datas as $k => $v1) {
		foreach ($v1 as $k2 => $v2) {
			echo $k.", ".$k2.", ".$v2."<br>";
		}
	}