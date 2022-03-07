<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Thursday, April 01, 2021
* @date Monday, July 05, 2021
* @file user.php
* @version 0.1
***********************************************************************/
require '../config/conection.php';
require '../user/m_user.php';
require '../config/app.php';
require $App->libs.'lib_base.php';
$user = new User();
switch($_GET["op"]){
	case "save":
		$correo = $user->get_email_user($_POST["gene01correopers"]);
		if($_POST["gene01clave1"] == $_POST["gene01clave2"]){
			if ($correo==''){
				$user->insert_user($_POST["gene01tipodoc"],$_POST["gene01doc"],$_POST["gene01nombre1"],$_POST["gene01nombre2"],$_POST["gene01apellido1"],$_POST["gene01apellido2"],$_POST["gene01fechanaci"],$_POST["gene01correoinst"],$_POST["gene01correopers"],$_POST["gene01direccion"],$_POST["gene01clave1"],$_POST["gene01fecha"],'',0);
			} else {
				echo "email";
			} 
		} else {
			echo "pass";
		}
		break;
	case "email":
		$correo = $user->get_email_user($_POST["gene01correopers"]);
		if(is_array($correo)){
			echo json_encode($correo);
		}
		break;
	case "list":
		$items=$user->get_users();
		$sub_array='';
		$sub_array = $sub_array.'<table class="table" id="table_data">
		<thead>
			<tr>
				<th style="width: 7%;">Tipo Doc</th>
				<th style="width: 5%;">Documento</th>
				<th style="width: 30%;">Nombre</th>
				<th style="width: 30%;">Correo</th>
				<th style="width: 10%;">Fecha Creación</th>
				<th style="width: 10%;">Fecha Modificación</th>
				<th class="text-center" style="width: 10%;" colspan="2">Acciones</th>
			</tr>
		</thead>
		<tbody>';
		foreach($items as $row){
			$sub_array = $sub_array.'<tr>';
			$sub_array = $sub_array.'<td>'.$row["gene01tipodoc"].'</td>';
			$sub_array = $sub_array.'<td>'.$row["gene01doc"].'</td>';
			$sub_array = $sub_array.'<td>'.$row["gene01nombrecomp"].'</td>';
			$sub_array = $sub_array.'<td>'.$row["gene01correopers"].'</td>';
			$sub_array = $sub_array.'<td>'.date("d-m-Y", strtotime($row["gene01fechacrea"])).'</td>';
			$sub_array = $sub_array.'<td>'.date("d-m-Y", strtotime($row["gene01fechamodi"])).'</td>';
			$sub_array = $sub_array.'<td><button type="button" onClick="editar('.$row["gene01id"].');"  id="'.$row["gene01id"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button></td>';
			$sub_array = $sub_array.'<td><button type="button" onClick="eliminar('.$row["gene01id"].');"  id="'.$row["gene01id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>';
			$sub_array = $sub_array.'</tr>';
		}
		$sub_array = $sub_array.'</tbody>
		</table>';
		echo $sub_array;
		break;
	case "show":
		$usuario=$user->get_user_id($_POST["gene01id"]);
		if (is_array($usuario)) {
			$output["gene01id"] = $usuario["gene01id"];
			$output["gene01tipodoc"] = $usuario["gene01tipodoc"];
			$output["gene01doc"] = $usuario["gene01doc"];
			$output["gene01nombre1"] = $usuario["gene01nombre1"];
			$output["gene01nombre2"] = $usuario["gene01nombre2"];
			$output["gene01apellido1"] = $usuario["gene01apellido1"];
			$output["gene01apellido2"] = $usuario["gene01apellido2"];
			$output["gene01fechanaci"] = divide_fecha($usuario["gene01fechanaci"]);
			$output["gene01direccion"] = $usuario["gene01direccion"];
			$output["gene01correoinst"] = $usuario["gene01correoinst"];
			$output["gene01correopers"] = $usuario["gene01correopers"];
		}
		echo json_encode($output);
		break;
	case "saveandedit":
		if (empty($_POST["gene01id"])){
			$correo = $user->get_email_user($_POST["gene01correopers"]);
			if ($correo==''){
				$_POST['gene01clave1']='';
				$gene01token=bin2hex(random_bytes(4));
				$user->insert_user($_POST["gene01tipodoc"],$_POST["gene01doc"],$_POST["gene01nombre1"],$_POST["gene01nombre2"],$_POST["gene01apellido1"],$_POST["gene01apellido2"],$_POST["gene01fechanaci"],$_POST["gene01correoinst"],$_POST["gene01correopers"],$_POST["gene01direccion"],$_POST["gene01clave1"],$_POST["gene01fecha"],$gene01token,1);
				echo "new_user";
			} else {
				echo "email";
			} 
		} else {
			$correo = $user->get_email_user($_POST["gene01correopers"]);
			if ($correo!=''){
				$user->update_user($_POST["gene01id"],$_POST["gene01tipodoc"],$_POST["gene01doc"],$_POST["gene01nombre1"],$_POST["gene01nombre2"],$_POST["gene01apellido1"],$_POST["gene01apellido2"],$_POST["gene01fechanaci"],$_POST["gene01correoinst"],$_POST["gene01correopers"],$_POST["gene01direccion"],$_POST["gene01fechamodi"]);
				echo "update";
			} else {
				// El email existe
				echo "email";
			}
		}
		break;
	case "activateanddeactivate":
		$items=$user->get_user_id($_POST["gene01id"]);
		if (is_array($items)==true and count($items)>0) {
			$user->delete_user($_POST['gene01id']);
		}
		break;
}
?>