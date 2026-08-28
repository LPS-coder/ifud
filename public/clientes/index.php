<?php
require_once '../../infra/conexao.php';
$stmt = $pdo->query("SELECT * FROM clientes");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="../index.php">Voltar</a> | <a href="criar.php">Novo Cliente</a>
<h2>Clientes</h2>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Endereço</th><th>Ações</th></tr>
    <?php foreach ($clientes as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['nome'] ?></td>
        <td><?= $c['email'] ?></td>
        <td><?= $c['telefone'] ?></td>
        <td><?= $c['endereco'] ?></td>
        <td>
            <a href="editar.php?id=<?= $c['id'] ?>">Editar</a> | 
            <a href="deletar.php?id=<?= $c['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>