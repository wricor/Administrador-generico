<?php
// Obtiene el id máximo de la tabla
function maxid($tabla, $indice, $conect){
	$max=0;
	$sql='SELECT MAX('.$indice.') AS id FROM '.$tabla.';';
	list($max)=$conect->query($sql);
	$max['id']=($max['id']+1);
	return array($max);
}
// Cambia la contraseña a un hash
function cambia_string($palabra){
	$password=password_hash($palabra, PASSWORD_DEFAULT);
	return $password;
}
// Quita tildes de una cadena
function quita_tildes($palabra){
    $palabra = str_replace(
        array('á', 'é', 'í', 'ó', 'ú'),
        array('a', 'e', 'i', 'o', 'u'),
        $palabra
    );
	return $palabra;
}
// Limpia la fecha que tiene guiones
function limpia_fecha($fecha){
	$fecha=str_replace('-','',$fecha);
	return $fecha;
}
// Limpia la fecha que tiene guiones
function divide_fecha($fecha){
	$dia=substr($fecha, 6, 2);
	$mes=substr($fecha, 4, 2);
	$anio=substr($fecha, 0, 4);
	$fecha=$anio.'-'.$mes.'-'.$dia;
	return $fecha;
}
// Entrega la fecha actual en formato yyyymmdd
function fecha_actual(){
	return strftime("%A, %B %d, %Y");
}

function obtiene_tablas(){
	$tablas=array();
	require '../app.php';
	$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
	$conect->conection();
	$sql = 'SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='.$App->dbname;
	$result=$conect->prepare($sql);
	$result->execute();
	$resultado=$result->get_result();
	while ($fila=$resultado->fetch_assoc()){
		$tablas[]=$fila['TABLE_NAME'];
	}
	$resultado->free();
	$conect->close();
	return array($tablas);
}

function obtiene_campos($tabla){
	$campos=array();
	require '../app.php';
	$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
	$conect->conection();
	$sql = 'SHOW COLUMNS FROM '.$tabla;
	$result=$conect->prepare($sql);
	$result->execute();
	$resultado=$result->get_result();
	while ($fila=$resultado->fetch_assoc()){
		$campos[]=$fila['Field'];
		$tipo[]=$fila['Type'];
	}
	$resultado->free();
	$conect->close();
	return array($campos, $tipo);
}

function arma_select($id, $opciones){
	$select='<select class="form-control" id="'.$id.'" name="'.$id.'" required>';
	$options='<option value="">Seleccione</option>';
	foreach($opciones as $opcion => $valor){
		$options=$options.'<option value="'.$valor['id'].'">'.$valor['nombre'].'</option>';
	}
	$select=$select.$options.'</select>';
	return $select;
}

function modal_texto($campo){
	$srow=substr($campo,6);
	$campo_texto='<label class="col-12" for="'.$campo.'">'.ucfirst($srow).'</label>
	<div class="col-md-12">
		<input type="text" class="form-control" id="'.$campo.'" name="'.$campo.'" placeholder="" required>
	</div>';
	echo $campo_texto;
}

function obtiene_opciones($campo){
	require '../../app.php';
	$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
	$conect->conection();
	$raiz=substr($campo,0,6);
	$sql = 'SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE "'.$raiz.'%";';
	list($tabla)=$conect->query($sql);
	$sql='SELECT '.$raiz.'id AS id, '.$raiz.'nombre AS nombre FROM '.$tabla['TABLE_NAME'].';';
	$opciones=$conect->query($sql);
	$conect->close();
	return $opciones;
}

function obtiene_sino(){
	$opciones[0]['id']=0;
	$opciones[0]['nombre']='No';
	$opciones[1]['id']=1;
	$opciones[1]['nombre']='Si';
	return $opciones;
}

function obtiene_opciones_tercero($campo){
	require '../../app.php';
	$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
	$conect->conection();
	$raiz=substr($campo,0,6);
	$sql = 'SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = "'.$App->dbname.'" AND TABLE_NAME LIKE "'.$raiz.'%";';
	list($tabla)=$conect->query($sql);
	// Definir roles para realizar esta operación
	$sql='SELECT '.$raiz.'doc AS id, '.$raiz.'nombrecomp AS nombre FROM '.$tabla['TABLE_NAME'].' WHERE ;';
	echo '$sql: '.$sql;
	$opciones=$conect->query($sql);
	$conect->close();
	return $opciones;
}

function modal_select($campo,$tabla,$tipo=0){
	switch($tipo){
		case 0:
			$opciones=obtiene_opciones($tabla);
			break;
		case 1:
			$opciones=obtiene_sino();
			break;
		case 2:
			$opciones=obtiene_opciones_tercero($tabla);
			break;
		}
	$srow=substr($campo,6);
	$campo_texto='<label class="col-12" for="'.$campo.'">'.ucfirst($srow).'</label>';
	$campo_texto=$campo_texto.'<div class="col-md-12">';
	$campo_texto=$campo_texto.arma_select($campo, $opciones);
	$campo_texto=$campo_texto.'</div>';
	echo $campo_texto;
}

function get_campos($gene10nombre){
	$campos=obtiene_campos($gene10nombre);
	$info=array($gene10nombre);
	foreach($campos[0] as $fila){
		// Cortar el campo para obtener los tres tipos de campo necesarios
		$nombreCampo=substr($fila, 6);
		if ($nombreCampo=='id' || $nombreCampo=='estado'){
			$info[]=$fila;
		}
	}
	return $info;
}

function get_info($gene02id){
	require '../app.php';
	$conect=new Conect($App->dbhost, $App->dbuser, $App->dbpass, $App->dbname);
	$conect->conection();
	$info=array();
	$sql='SELECT gene02ruta, gene02nombre, gene03nombre, gene03id, gene02name FROM gene02menu, gene03aplicativo, gene04modulo WHERE gene02modulo=gene04id AND gene03id=gene04idaplicativo AND gene02id='.$gene02id;
	$result=$conect->prepare($sql);
	$result->execute();
	$resultado=$result->get_result();
	while ($fila=$resultado->fetch_row()){
		$info=$fila;
	}
	$gene02name=array_pop($info);
	array_push($info, strtolower(quita_tildes($gene02name)), quita_tildes($gene02name), mb_strtoupper($gene02name));
	return $info;
}
?>