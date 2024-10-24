<?php
include 'create_db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Gerenciamento de Clientes</h1>
        <form id="clientForm" method="POST">
            <input type="hidden" id="id" name="id">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome">
            <label for="telefone">Número de Telefone com (DDD): </label>
            <input type="tel" id="telefone" name="telefone" pattern="\d{11}" maxlength="11" required
                title="Digite um número de telefone com 11 dígitos">
            <label for="endereco">Endereço: </label>
            <input type="text" id="endereco" name="endereco">
            <button type="submit">Cadastrar Cliente</button>
        </form>
        <h2>Lista de clientes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody id="clienteTable">
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>

</html>