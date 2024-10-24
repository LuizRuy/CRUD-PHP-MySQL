<?php
include 'connection.php';

$nome = mysqli_real_escape_string($connect, $_POST['nome']);
$telefone = mysqli_real_escape_string($connect, $_POST['telefone']);
$endereco = mysqli_real_escape_string($connect, $_POST['endereco']);

$query = "INSERT INTO clientes (nome, telefone, endereco) VALUES ('$nome', '$telefone', '$endereco')";
if(mysqli_query($connect, $query)){
    echo json_encode(['status' => 'success']);
}else{
    echo json_encode(['status' => 'error', 'message' => mysqli_error($connect)]);
}
?>