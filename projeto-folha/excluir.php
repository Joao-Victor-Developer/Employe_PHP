<?php
require 'config.php';

if (empty($_GET['id'])) {
    header('Location: listagem.php');
    exit;
}

$id = (int) $_GET['id'];

// Você pode fazer soft-delete (recomendado em produção). Aqui vamos excluir.
$stmt = $pdo->prepare("DELETE FROM tb_funcionarios WHERE N_Registro = :id");
$stmt->execute([':id' => $id]);

header("Location: listagem.php?msg=Registro+excluido");
exit;
