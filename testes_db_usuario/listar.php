<?php
    header('Content-Type: text/html; charset=utf-8');
    $con = mysqli_connect('127.0.0.1', 'root', '', 'desafio') or die("Falha em conectar ao MySQL: " . mysqli_error());
    $sql = "SELECT msisdn,name,access_level,password,external_id FROM usuario";
    if ($resultados = $con->query($sql)) {
        echo"<table>";
        echo"<tr><td>name</td><td>msisdn</td><td>access_level</td><td>external_id</td></tr>";
        while ($row = $resultados->fetch_assoc()){
            echo "<tr><td>".utf8_encode($row["name"])."</td><td>".$row["msisdn"]."</td><td>".$row["access_level"]."</td><td>".$row["external_id"]."</td></tr>";
        }
        echo"</table>";       
        $resultados->close();
     }
     $con->close();
?>
<br>
<a href="cadastro.html">Cadastrar usuários (banco)</a><br>
<a href="listar.php">Listar todos usuários (banco)</a><br>
<a href="view/usuario/listar">RestAPI/usuario/listar</a><br>
<br>
