<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Wednesday, November 10, 2021
* @file change.php
* @version 0.1
***********************************************************************/
require '../config/conection.php';
require '../change/m_change.php';
$change = new Change();

switch($_GET["op"]){
	case "verify_token":
		$change->verify_tkn($_POST["gene01correopers"], $_POST["gene01token"]);
		break;
	case "change_password":
		$change->change_pass($_POST["gene01clave1"], $_POST["gene01correopers"]);
		break;
}
?>