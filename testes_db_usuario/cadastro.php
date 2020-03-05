<?php

$msisdn = $_POST['msisdn'];
$name = $_POST['name'];
$access_level = $_POST['access_level'];
$password = MD5($_POST['password']);
$external_id = $_POST['external_id'];

$con = mysqli_connect('127.0.0.1', 'root', '', 'desafio') or die("Falha em conectar ao MySQL: " . mysqli_error());
$sql = "INSERT INTO usuario (msisdn,name,access_level,password,external_id) VALUES ('$msisdn','$name','$access_level','$password','$external_id')";
$sql = $con->prepare($sql);
$sql->execute();

echo '<script language="javascript">';
echo 'alert("Usuário cadastrado com sucesso.")';
echo '</script>';

header("Location: index.html"); 
exit();

?>