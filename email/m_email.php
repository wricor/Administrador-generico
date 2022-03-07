<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Thursday, April 01, 2021
* @date Monday, July 05, 2021
* @file Email.php
* @version 0.1
***********************************************************************/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../tools/PHPMailer/src/Exception.php';
require '../tools/PHPMailer/src/PHPMailer.php';
require '../tools/PHPMailer/src/SMTP.php';

require '../user/m_user.php';

class Email extends PHPMailer{
	public function recover($gene01correopers){
		require '../config/app.php';
		$user = new User();
		$user->update_reminder($gene01correopers);
		$correo = $user->get_email_user($gene01correopers);
		$name = $correo["gene01nombre1"].' '.$correo["gene01nombre2"].' '.$correo["gene01apellido1"].' '.$correo["gene01apellido2"];
		$pass = $correo["gene01clave"];
		$url = $App->mainRoute.'external/change_pass.php?gene01correopers='.$correo["gene01correopers"].'&gene01token='.$correo["gene01token"];
		$mail = new PHPMailer(true);
		$this->IsSMTP();
		$this->Host=$app->mailHost;
		$this->Port=$app->mailPort;
		$this->SMTPAuth=true;
		$this->Username=$App->mailUser;
		$this->Password=$App->mailPass;
		$this->SMTPSecure='tsl';
		$this->From=$App->mailUser;
		$this->CharSet='UTF8';
		$this->addAddress($gene01correopers);
		$this->WordWrap=50;
		$this->IsHTML(true);
		$this->Subject = 'Recuperar Contraseña';
		$cuerpo = file_get_contents('../email/recover.html');
		$cuerpo = str_replace('name',$name,$cuerpo);
		$cuerpo = str_replace('link',$url,$cuerpo);
		$cuerpo = str_replace('mainRoute',$App->mainRoute.'external',$cuerpo);
		$this->Body = $cuerpo;
		$this->IsHTML(true);
		return $this->Send();
	}

	public function new_user($gene01correopers){
		require '../config/app.php';
		$user = new User();
		$correo = $user->get_email_user($gene01correopers);
		$name = $correo["gene01nombre1"].' '.$correo["gene01nombre2"].' '.$correo["gene01apellido1"].' '.$correo["gene01apellido2"];
		$pass = $correo["gene01clave"];
		$mail = new PHPMailer(true);
		$this->IsSMTP();
		$this->Host=$app->mailHost;
		$this->Port=$app->mailPort;
		$this->SMTPAuth=true;
		$this->Username=$App->mailUser;
		$this->Password=$App->mailPass;
		$this->SMTPSecure='tsl';
		$this->From=$App->mailUser;
		$this->CharSet='UTF8';
		$this->addAddress($gene01correopers);
		$this->WordWrap=50;
		$this->IsHTML(true);
		$this->Subject = 'Registro Correcto';
		$cuerpo = file_get_contents('../email/new_user.html');
		$cuerpo = str_replace('labelname',$name,$cuerpo);
		$this->Body = $cuerpo;
		$this->IsHTML(true);
		$this->AltBody = strip_tags('Registro Correcto');
		return $this->Send();
	}

	public function new_user_app($gene01correopers){
		require '../config/app.php';
		$user = new User();
		$correo = $user->get_email_user($gene01correopers);
		$name = $correo["gene01nombre1"].' '.$correo["gene01nombre2"].' '.$correo["gene01apellido1"].' '.$correo["gene01apellido2"];
		$pass = $correo["gene01clave"];
		$url = $App->mainRoute.'external/change_pass.php?gene01correopers='.$correo["gene01correopers"].'&gene01token='.$correo["gene01token"];
		$mail = new PHPMailer(true);
		$this->IsSMTP();
		$this->Host=$app->mailHost;
		$this->Port=$app->mailPort;
		$this->SMTPAuth=true;
		$this->Username=$App->mailUser;
		$this->Password=$App->mailPass;
		$this->SMTPSecure='tsl';
		$this->From=$App->mailUser;
		$this->CharSet='UTF8';
		$this->addAddress($gene01correopers);
		$this->WordWrap=50;
		$this->IsHTML(true);
		$this->Subject = 'Registro de Contraseña';
		$cuerpo = file_get_contents('../email/new_user_app.html');
		$cuerpo = str_replace('name',$name,$cuerpo);
		$cuerpo = str_replace('link',$url,$cuerpo);
		$this->Body = $cuerpo;
		$this->IsHTML(true);
		return $this->Send();
	}
}
?>