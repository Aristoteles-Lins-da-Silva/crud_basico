<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM carros WHERE id = ?");
$stmt->execute([$id]);
$carro = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $chaci = $_POST['chaci'];
    $fabricacao = $_POST['fabricacao'];
    $placa = $_POST['placa'];
    $stmt = $pdo->prepare("UPDATE carros SET nome = ?, chaci = ?, fabricacao = ?, placa = ? WHERE id = ?");
    $stmt->execute([$nome, $chaci, $fabricacao, $placa, $id]);
    header('Location: read-carro.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Carros</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-carro.php">Listar Carros</a></li>
                <li><a href="create-carro.php">Adicionar Carro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Carro</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $carro['nome'] ?>" required>
            <label for="chaci">Chaci:</label>
            <input type="text" id="chaci" name="chaci" value="<?= $carro['chaci'] ?>" required>
            <label for="fabricacao">Fabricacao:</label>
            <input type="date" id="fabricacao" name="fabricacao" value="<?= $carro['fabricacao'] ?>" required>
            <label for="text">Placa:</label>
            <input type="text" id="placa" name="placa" value="<?= $carro['placa'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Carros</p>
    </footer>
</body>
</html>
