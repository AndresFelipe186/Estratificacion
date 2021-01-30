<?php 

require ('../Model/conexion.php');
require ('Constans.php');

if (!isset($_SESSION)) {
    session_start();
}

$usuario = $_GET['usuario'];
$password = $_GET['password'];

$con = new Conexion();

$searchUser = $con->getUser($usuario,$password);

foreach ($searchUser as $user) {
    $idUsuario = $user['id_usu'];
    $tipo = $user['tipo'];
    $login = $user['login'];
    $nombres = $user['nombre'];
    $password = $user['password'];
    $foto = $user['foto'];
}

if (!$searchUser[0]) {
    echo '
     <script language = javascript>
	alert("Usuario o Password incorrectos, por favor intenta de nuevo")
	self.location = "../index.php"
	</script>
    ';
}

else if ($tipo == 'VENTAS'){

    //$_SESSION ['id_usu'] = $idUsuario

     require ('../Views/WellcomeVentas.php');
}
else if ($tipo == 'ADMINISTRADOR'){

     require ('../Views/Wellcome.php');
}
 ?>