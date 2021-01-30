<?php 

class Conexion {

	private $user ;
	private $password;
	private $server;
	private $database;
	private $con;

	public function __(){
	 $user ='root';
	 $password='';
	 $server='localhost';
	 $database='estratificacion';
	 $con='';
	 $this->con = new mysqli($server, $user, $password, $database);

	}

	public function getUser($usuario, $password)
    {

        $query = $this->con->query("SELECT * FROM usuarios WHERE login='" . $usuario . "' AND password='" . $password . "'");

        $retorno = [];

        $i = 0;
        while ($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

}

 ?>