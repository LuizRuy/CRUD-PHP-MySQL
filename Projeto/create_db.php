<?php
$servername = "localhost"; //Endereço do seu servidor
$username = "root"; // Usuário do banco de dados
$password = "admin"; // Senha do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Criar banco de dados se não existir
$dbname = "projeto";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso.";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error;
}

// Selecionar o banco de dados
$conn->select_db($dbname);

// Criar tabela se não existir
$tableSql = "CREATE TABLE IF NOT EXISTS clientes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    endereco VARCHAR(255) NOT NULL
)";
if ($conn->query($tableSql) === TRUE) {
    echo "Tabela criada com sucesso.";
} else {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Fechar conexão
$conn->close();
?>
