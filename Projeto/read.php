<?php
include 'connection.php';

$query = "SELECT * FROM clientes";
$result = mysqli_query($connect, $query);
$clientes = [];

while ($row = mysqli_fetch_assoc($result)){
    $clientes[] = $row;
}

echo json_encode($clientes);
?>