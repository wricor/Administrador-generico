<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Thursday, April 01, 2021
* @date Monday, July 05, 2021
* @file email.php
* @version 0.1
***********************************************************************/
require '../config/conection.php';
require '../email/m_email.php';
$email = new Email();

switch($_GET["op"]){
	case "send_recover":
		$email->recover($_POST["gene01correopers"]);
		break;
	case "send_new":
		$email->new_user($_POST["gene01correopers"]);
		break;
	case "send_new_app":
		$email->new_user_app($_POST["gene01correopers"]);
		break;
}
?>