<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $chaci = $_POST['chaci'];
    $fabricacao = $_POST['fabricacao'];
    $placa = $_POST['placa'];
    $stmt = $pdo->prepare("INSERT INTO carros (nome, chaci, fabricacao, placa) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $chaci, $fabricacao, $placa]);
    header('Location: read-carro.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar carro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de carros</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-carro.php">Listar carros</a></li>
                <li><a href="create-carro.php">Adicionar carro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar carro</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="chaci">Chaci:</label>
            <input type="text" id="chaci" name="chaci" required>
            <label for="fabricacao">Data de fabricacao:</label>
            <input type="date" id="fabricacao" name="fabricacao" required>
            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" required>
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de carros</p>
    </footer>
</body>
</html>
