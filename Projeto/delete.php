<?php
include 'connection.php';

$id = mysqli_real_escape_string($connect, $_POST['id']);

$query = "DELETE FROM clientes WHERE id= $id";

if (mysqli_query($connect, $query)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($connect)]);
}
?>