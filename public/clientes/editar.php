<?php
require_once '../../infra/conexao.php';
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?");
    $stmt->execute([$_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['endereco'], $id]);
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->execute([$id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<a href="index.php">Voltar</a>
<h2>Editar Cliente</h2>
<form method="POST">
    <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br><br>
    <input type="email" name="email" value="<?= $cliente['email'] ?>" required><br><br>
    <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>"><br><br>
    <textarea name="endereco"><?= $cliente['endereco'] ?></textarea><br><br>
    <button type="submit">Atualizar</button>
</form>