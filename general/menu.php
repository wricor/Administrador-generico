<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, July 05, 2021
* @file prueba.php
* @version 0.1
***********************************************************************/
require '../general/m_menu.php';
	$menu = new Menu();
	$htmlmenu = '';
	$itemmenu = $menu->get_menu();
	for($i=0; $i<sizeof($itemmenu);$i++){
		if($itemsubmenu = $menu->get_submenu($itemmenu[$i]["gene04id"])){
			// Cuando tiene elementos en el submenú los trae
			$htmlmenu=$htmlmenu.'<li class="nav-item">
			<a href="'.$itemmenu[$i]["gene04ruta"].'" class="nav-link">
			<!-- <img class="icono" src="'.$itemmenu[$i]["gene04icono"].'"> -->
				<i class="nav-icon fas fa-stream"></i>
				<p>'.$itemmenu[$i]["gene04nombre"].'
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>';
			for($j=0; $j<sizeof($itemsubmenu);$j++){
				if($itemsubmenu[$j]['gene02carpeta']!=''){
					$ruta='../'.$itemsubmenu[$j]['gene02carpeta'].'/'.$itemsubmenu[$j]["gene02ruta"];
				}
				$htmlmenu=$htmlmenu.'<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="'.$ruta.'" class="nav-link">
						<i class="far far fa-arrow-alt-circle-right"></i>
						<p>'.$itemsubmenu[$j]["gene02nombre"].'</p>
					</a>
				</li>
			</ul>';
			}
			$htmlmenu=$htmlmenu.'</li>';	
		} else {
			// Cuando no tiene submenú permite que cargue una página desde el enlace principal
			if($itemmenu[$i]['gene04ruta']!=''){
				$ruta=$itemmenu[$i]["gene04ruta"];
			}
			$htmlmenu=$htmlmenu.'<li class="nav-item">
				<a href="'.$ruta.'" class="nav-link">
					<!-- <img class="icono" src="'.$itemmenu[$i]["gene04icono"].'"> -->
					<i class="nav-icon far fa-user"></i>
					<p>'.$itemmenu[$i]["gene04nombre"].'
					</p>
				</a>
			</li>';
		}
	}
echo $htmlmenu;
?>