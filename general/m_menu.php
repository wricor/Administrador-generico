<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Thursday, April 01, 2021
* @date Monday, July 05, 2021
* @file Menu.php
* @version 0.1
***********************************************************************/
class Menu {
	public function get_menu(){
		$menu=array();
		require '../config/app.php';
		$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
		$conect->conection();
		$sql='SELECT * FROM gene04modulo WHERE gene04estado=1 AND gene04idaplicativo IN (1,2)';
		$result=$conect->prepare($sql);
		$result->execute();
		$resultado=$result->get_result();
		if($resultado->num_rows>0){
			while ($fila=$resultado->fetch_assoc()){
				$menu[]=$fila;
			}
			$resultado->free();
			return $menu;
		} else {
			header("Location:".$App->mainRoute."external/index.php?m=1");
			exit();
		}
		$conect->close();
	}
	public function get_submenu($gene04id){
		$submenu=array();
		require '../config/app.php';
		$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
		$conect->conection();
		$sql='SELECT * FROM gene02menu WHERE gene02estado=1 AND gene02modulo='.$gene04id.'';
		$result=$conect->prepare($sql);
		$result->execute();
		$resultado=$result->get_result();
		if($resultado->num_rows>0){
			while ($fila=$resultado->fetch_assoc()){
				$submenu[]=$fila;
			}
			$resultado->free();
			return $submenu;
		} else {
			return false;
		}
		$conect->close();
	}
}
?>