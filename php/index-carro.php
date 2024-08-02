<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM carros");
$carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Carros</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Carros</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-carro.php">Listar Carros</a></li>
                <li><a href="create-carro.php">Adicionar Carro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Carros</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Chaci</th>
                    <th>fabricacao</th>
                    <th>Placa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $carro): ?>
                    <tr>
                        <td><?= $carro['id'] ?></td>
                        <td><?= $carro['nome'] ?></td>
                        <td><?= $carro['chaci'] ?></td>
                        <td><?= $carro['fabricacao'] ?></td>
                        <td><?= $carro['placa'] ?></td>
                        <td>
                            <a href="update-carro.php?id=<?= $carro['id'] ?>">Editar</a>
                            <a href="delete-carro.php?id=<?= $carro['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Carros</p>
    </footer>
</body>
</html>
