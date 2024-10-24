<?php
include 'connection.php';

$id = mysqli_real_escape_string($connect, $_POST['id']);
$nome = mysqli_real_escape_string($connect, $_POST['nome']);
$telefone = mysqli_real_escape_string($connect, $_POST['telefone']);
$endereco = mysqli_real_escape_string($connect, $_POST['endereco']);

$query = "UPDATE clientes SET nome ='$nome', telefone='$telefone', endereco='$endereco' WHERE id=$id";

if (mysqli_query($connect, $query)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($connect)]);
}
?>