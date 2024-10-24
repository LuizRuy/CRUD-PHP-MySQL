<?php
$server = "localhost";//Endereço do seu servidor
$user = "root";// Usuário do banco de dados
$password = "admin";// Senha do banco de dados
$dbname = "projeto";

$connect = mysqli_connect($server, $user, $password, $dbname);

if(!$connect){
    die("Falha na conexão: ". mysqli_connect_error());
}
?>