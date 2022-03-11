<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Thursday, April 01, 2021
* @date Monday, July 05, 2021
* @file prueba.php
* @version 0.1
***********************************************************************/
require '../config/conection.php';
session_destroy();
require '../config/app.php';
$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
$conect->conection();
header("Location:".$App->mainRoute."external/index.php");
$conect->close();
exit();
?>