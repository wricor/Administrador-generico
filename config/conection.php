<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, July 05, 2021
* @file conection.php
* @version 0.1
***********************************************************************/
if (!isset($_SESSION)){
	session_start();
}
class Conect {
	// Conexión
	private $mysqli;
	// Variables
	private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
	// Error
	private $error=NULL;
	// Constructor
	public function __construct($dbhost, $dbuser, $dbpass, $dbname){
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
	}
	// Verifica la conexión
	public function conection(){
		$this->mysqli = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if ($this->mysqli->connect_errno){
			$this->error = "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
			return false;
		}
	}
	// Consulta
	public function query($sql){
		if (($resultado = $this->mysqli->query($sql))){
            if (is_object($resultado)) {
                return $this->result($resultado);
            } else {
                return true;
            }
        } else {
			$this->error = "No se pudo obtener el resultado: " . $this->mysqli->error;
			return false;
		}
	}
	// Procesar los resultados
    private function result(mysqli_result &$resultado){
        $resultados = array();
        while ($fila = $resultado->fetch_assoc()){
            $resultados[] = $fila;
        }
        $resultado->free();
        return $resultados;
    }
	// Limpiado de cadena de caracteres
	public function clearstring($cadena){
        return $this->mysqli->escape_string($cadena);
    }
	// Cerrado de la conexión
	public function close(){
        if (is_object($this->mysqli)){
            $this->mysqli->close();
        }
    }

	function prepare($sql) {
		$result = $this->mysqli->prepare($sql);
		return $result;
	}
}
?>