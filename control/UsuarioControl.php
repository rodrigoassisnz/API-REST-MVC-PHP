<?php
include '../../model/Usuario.php';

class UsuarioControl{
	function insert($obj){
		$usuario = new Usuario();
		//echo $obj->titulo;
		return $usuario->insert($obj);
		header('Location:listar.php');
	}

	function update($obj,$id){
		$usuario = new Usuario();
		return $usuario->update($obj,$id);
	}

	function delete($obj,$id){
		$usuario = new Usuario();
		return $usuario->delete($obj,$id);
	}

	function find($id = null){

	}

	function findAll(){
		$usuario = new Usuario();
		return $usuario->findAll();
	}
}

?>