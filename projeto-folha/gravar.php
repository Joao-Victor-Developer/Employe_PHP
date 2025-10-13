<?php
require 'config.php';

// constantes
define('SALARIO_MINIMO', 1412.00);
define('LIMITE_INSS', 1550.00);
define('ALIQ_INSS', 0.11);

// Recebe via POST
$N_Registro = !empty($_POST['N_Registro']) ? $_POST['N_Registro'] : null;
$nome = trim($_POST['Nome_Funcionario'] ?? '');
$data_admissao = $_POST['data_admissao'] ?? null;
$cargo = $_POST['cargo'] ?? '';
$qtde_salarios = (float) ($_POST['qtde_salarios'] ?? 0);

// Validações básicas
$errors = [];
if ($nome === '') $errors[] = 'Nome é obrigatório.';
if ($qtde_salarios <= 0) $errors[] = 'Quantidade de salários deve ser maior que zero.';
if (!empty($data_admissao) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_admissao)) $data_admissao = null;

if (!empty($errors)) {
    foreach ($errors as $e) echo "<p style='color:red;'>$e</p>";
    echo '<p><a href="home_funcionarios.php">Voltar</a></p>';
    exit;
}

// Cálculos
$salario_bruto = round($qtde_salarios * SALARIO_MINIMO, 2);
$inss = ($salario_bruto > LIMITE_INSS) ? round($salario_bruto * ALIQ_INSS, 2) : 0.00;
$salario_liquido = round($salario_bruto - $inss, 2);

// Inserir ou atualizar
if (empty($N_Registro)) {
    // inserir
    $sql = "INSERT INTO tb_funcionarios (Nome_Funcionario, data_admissao, cargo, qtde_salarios, salario_bruto, inss, salario_liquido)
            VALUES (:nome, :data_adm, :cargo, :qtde, :bruto, :inss, :liquido)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':data_adm' => $data_admissao,
        ':cargo' => $cargo,
        ':qtde' => $qtde_salarios,
        ':bruto' => $salario_bruto,
        ':inss' => $inss,
        ':liquido' => $salario_liquido
    ]);
    $id = $pdo->lastInsertId();
    header("Location: listagem.php?msg=Inserido&id=$id");
    exit;
} else {
    // atualizar (caso tenha implementado edição)
    $sql = "UPDATE tb_funcionarios SET Nome_Funcionario=:nome, data_admissao=:data_adm, cargo=:cargo, qtde_salarios=:qtde,
            salario_bruto=:bruto, inss=:inss, salario_liquido=:liquido WHERE N_Registro=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':data_adm' => $data_admissao,
        ':cargo' => $cargo,
        ':qtde' => $qtde_salarios,
        ':bruto' => $salario_bruto,
        ':inss' => $inss,
        ':liquido' => $salario_liquido,
        ':id' => $N_Registro
    ]);
    header("Location: listagem.php?msg=Atualizado&id=$N_Registro");
    exit;
}
