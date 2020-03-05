<?php
include '../../conexao/Conexao.php';

class Usuario extends Conexao{
	private $msisdn;
    private $name;
    private $access_level;
    private $password;
    private $external_id;

    function getMsisdn() {
        return $this->msisdn;
    }

    function getName() {
        return $this->name;
    }

    function getAccess_level() {
        return $this->access_level;
    }

    function getPassword() {
        return $this->password;
    }

    function getPeriodo_id() {
        return $this->periodo_id;
    }

    function getExternal_id() {
        return $this->external_id;
    }

    function setMsisdn($msisdn) {
        $this->msisdn = $msisdn;
    }

    function setName($name) {
        $this->$name = $name;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setAccess_level($access_level) {
        $this->access_level = $access_level;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setExternal_id($external_id) {
        $this->external_id = $external_id;
    }

    public function insert($obj){
    	$sql = "INSERT INTO usuario(msisdn,name,access_level,password,external_id) VALUES (:msisdn,:name,:access_level,:password,:external_id)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('msisdn',  $obj->msisdn);
        $consulta->bindValue('name', $obj->name);
        $consulta->bindValue('access_level' , $obj->access_level);
        $consulta->bindValue('password' , $obj->password);
        $consulta->bindValue('external_id' , $obj->external_id);
    	return $consulta->execute();
	}

	public function update($obj,$id = null){
		$sql = "UPDATE usuario SET msisdn = :msisdn,name = :name,access_level = :access_level,password =:password,external_id = :external_id WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('msisdn', $obj->msisdn);
		$consulta->bindValue('name', $obj->name);
		$consulta->bindValue('access_level' , $obj->access_level);
		$consulta->bindValue('password', $obj->password);
		$consulta->bindValue('external_id' , $obj->external_id);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM usuario WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
	}

	public function find($id = null){

	}

	public function findAll(){
		$sql = "SELECT * FROM usuario";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
    }
    
    public function msisdnExists(){
        $sql = "SELECT * FROM usuario WHERE msisdn = :msisdn ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('msisdn', $obj->msisdn);
		$consulta->bindValue('name', $obj->name);
		$consulta->bindValue('access_level' , $obj->access_level);
		$consulta->bindValue('password', $obj->password);
		$consulta->bindValue('external_id' , $obj->external_id);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
    }
}

?>