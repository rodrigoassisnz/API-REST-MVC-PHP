<?php
include '../../control/UsuarioControl.php';
$usuarioControl = new UsuarioControl();

header('Content-Type: application/json');

foreach($usuarioControl->findAll() as $valor){
	echo json_encode($valor);
}


?>