<?php
require_once '../../infra/conexao.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header('Location: index.php');
exit;