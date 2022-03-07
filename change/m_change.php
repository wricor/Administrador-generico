<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Wednesday, November 10, 2021
* @file Change.php
* @version 0.1
***********************************************************************/
class Change{
	public function verify_tkn($gene01correopers, $gene01token){
		require '../config/app.php';
		$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
		$conect->conection();
		if(isset($_POST["gene01correopers"])){
			if(empty($gene01correopers) && empty($gene01token)){
				header("Location:".$App->mainRoute."external/");
				exit();
			} else {
				$sql="SELECT gene01correopers, gene01token FROM gene01tercero WHERE gene01correopers=? AND gene01token=? AND gene01requierepass=1";
				if ($result = $conect->prepare($sql)){
					$result->bind_param('ss', $gene01correopers, $gene01token);
					$result->execute();
					$resultado = $result->get_result();
					if($resultado->num_rows>0){
						echo 'Pasa';
					} else {
						echo 'No pasa';
						exit();
					}
				}
			}
		}
	}

	public function change_pass($gene01clave1, $gene01correopers){
		require '../config/app.php';
		$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
		$conect->conection();
		$sql="UPDATE gene01tercero SET gene01clave=?, gene01token='', gene01requierepass=0 WHERE gene01correopers=?;";
		$password=password_hash($gene01clave1, PASSWORD_DEFAULT);
		$result=$conect->prepare($sql);
		$result->bind_param('ss', $password, $gene01correopers);
		$result->execute();
	}
	
}
?>