<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, July 05, 2021
* @file User.php
* @version 0.1
***********************************************************************/
	class User {
		// Ingreso desde el archivo principal de la aplicación con correo y contraseña
		public function login(){
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			if(isset($_POST["send"])){
				$password = $_POST["password"];
				$email = $_POST["email"];
				if(empty($email) && empty($password)){
					header("Location:".$App->mainRoute."external/index.php?m=2");
					exit();
				} else {
					$sql = "SELECT * FROM gene01tercero WHERE gene01correopers=? AND gene01estado=1";
					if ($result = $conect->prepare($sql)){
						$result->bind_param('s', $email);
						$result->execute();
						$resultado = $result->get_result();
						if($resultado->num_rows<1){
							echo "sin valores"; 
						}else{
							$fila = $resultado->fetch_assoc();
						}
						echo 'clave: '.var_dump($fila['gene01clave']).'<br>';
						if (password_verify($password, $fila['gene01clave'])){
							$_SESSION["gene01id"] = $fila["gene01id"];
							$_SESSION["gene01nombre1"] = $fila["gene01nombre1"];
							$_SESSION["gene01nombre2"] = $fila["gene01nombre2"];
							$_SESSION["gene01apellido1"] = $fila["gene01apellido1"];
							$_SESSION["gene01apellido2"] = $fila["gene01apellido2"];
							$_SESSION["gene01correopers"] = $fila["gene01correopers"];
							header("Location:".$App->mainRoute."home/");
						} else {
							header("Location:".$App->mainRoute."external/index.php?m=1");
							exit();
						}
					}
				}
			}
			$conect->close();
		}

		// Crea usuario desde la parte externa de la aplicación (Signup)
		public function insert_user($gene01tipodoc,$gene01doc,$gene01nombre1,$gene01nombre2,$gene01apellido1,$gene01apellido2,$gene01fechanaci,$gene01correoinst,$gene01correopers,$gene01direccion,$gene01clave,$gene01fecha,$gene01token,$gene01requierepass){
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$gene01nombrecomp='';
			$gene01id=0;
			if($gene01nombre1!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01nombre1;
			}
			if($gene01nombre2!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01nombre2;
			}
			if($gene01apellido1!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01apellido1;
			}
			if($gene01apellido2!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01apellido2;
			}
			list($max)=maxid('gene01tercero', 'gene01id', $conect);
			$gene01id=$max['id'];
			$gene01fechanaci=limpia_fecha($gene01fechanaci);
			$sql="INSERT INTO gene01tercero VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1',?,?);";
			$result=$conect->prepare($sql);
			$gene01clave=cambia_string($gene01clave);
			$result->bind_param('isisssssissssiisi',$gene01id,$gene01tipodoc,$gene01doc,$gene01nombre1,$gene01nombre2,$gene01apellido1,$gene01apellido2,$gene01nombrecomp,$gene01fechanaci,$gene01correoinst,$gene01correopers,$gene01direccion,$gene01clave,$gene01fecha,$gene01fecha,$gene01token,$gene01requierepass);
			$result->execute();
			$conect->close();
		}

		public function update_user($gene01id,$gene01tipodoc,$gene01doc,$gene01nombre1,$gene01nombre2,$gene01apellido1,$gene01apellido2,$gene01fechanaci,$gene01correoinst,$gene01correopers,$gene01direccion,$gene01fechamodi){
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$gene01nombrecomp='';
			if($gene01nombre1!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01nombre1;
			}
			if($gene01nombre2!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01nombre2;
			}
			if($gene01apellido1!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01apellido1;
			}
			if($gene01apellido2!=''){
				$gene01nombrecomp=$gene01nombrecomp.' '.$gene01apellido2;
			}
			$gene01fechanaci=limpia_fecha($gene01fechanaci);
			$sql="UPDATE gene01tercero SET gene01tipodoc=?,gene01doc=?,gene01nombre1=?,gene01nombre2=?,gene01apellido1=?,gene01apellido2=?,gene01nombrecomp=?,gene01fechanaci=?,gene01correoinst=?,gene01correopers=?,gene01direccion=?,gene01fechamodi=? WHERE gene01id=?;";
			$result=$conect->prepare($sql);
			$result->bind_param('sisssssisssii',$gene01tipodoc,$gene01doc,$gene01nombre1,$gene01nombre2,$gene01apellido1,$gene01apellido2,$gene01nombrecomp,$gene01fechanaci,$gene01correoinst,$gene01correopers,$gene01direccion,$gene01fechamodi,$gene01id);
			$result->execute();
			$conect->close();
		}

		public function delete_user($gene01id){
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$sql="UPDATE gene01tercero SET gene01estado=0 WHERE gene01id=?;";
			$result=$conect->prepare($sql);
			$result->bind_param('i',$gene01id);
			$result->execute();
			$conect->close();
		}

		public function get_user_id($gene01id){
			$usuario=array();
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$sql="SELECT * FROM gene01tercero WHERE gene01id=?;";
			$result=$conect->prepare($sql);
			$result->bind_param('i',$gene01id);
			$result->execute();
			$resultado=$result->get_result();
			$usuario=$resultado->fetch_array();
			$resultado->free();
			$conect	->close();
			return $usuario;
		}

		public function get_users(){
			$usuarios=array();
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$sql="SELECT gene01id, gene01tipodoc, gene01doc, gene01nombrecomp, gene01correopers, gene01fechacrea, gene01fechamodi FROM gene01tercero WHERE gene01estado=1;";
			$result=$conect->prepare($sql);
			$result->execute();
			$resultado=$result->get_result();
			while ($fila=$resultado->fetch_assoc()){
				$usuarios[]=$fila;
			}
			$resultado->free();
			return $usuarios;
		}

		public function get_email_user($gene01correopers){
			$correo='';
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$sql="SELECT * FROM gene01tercero WHERE gene01correopers=? AND gene01estado=1;";
			$result=$conect->prepare($sql);
			$result->bind_param('s',$gene01correopers);
			$result->execute();
			$resultado=$result->get_result();
			$correo=$resultado->fetch_assoc();
			$resultado->free();
			$conect->close();
			return $correo;
		}
		
		public function update_reminder($gene01correopers){
			$token=bin2hex(random_bytes(4));
			require '../config/app.php';
			$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
			$conect->conection();
			$sql="UPDATE gene01tercero SET gene01token=?,gene01requierepass=1 WHERE gene01correopers=?";
			$result=$conect->prepare($sql);
			$result->bind_param('ss',$token,$gene01correopers);
			$result->execute();
			$conect->close();
		}
	}
?>