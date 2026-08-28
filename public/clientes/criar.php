<?php
require_once '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['endereco']]);
    header('Location: index.php');
    exit;
}
?>
<a href="index.php">Voltar</a>
<h2>Cadastrar Cliente</h2>
<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="telefone" placeholder="Telefone"><br><br>
    <textarea name="endereco" placeholder="Endereço"></textarea><br><br>
    <button type="submit">Salvar</button>
</form>