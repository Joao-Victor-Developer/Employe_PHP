<?php
require 'config.php';

// Se for editar, carregar dados
$edit = false;
$dados = [
  'N_Registro' => '',
  'Nome_Funcionario' => '',
  'data_admissao' => '',
  'cargo' => '',
  'qtde_salarios' => ''
];

if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM tb_funcionarios WHERE N_Registro = ?");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();
    if ($row) {
        $edit = true;
        $dados = $row;
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Cadastro de Funcionários</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Cadastro de Funcionários</h2>

<form action="gravar.php" method="post">
  <input type="hidden" name="N_Registro" value="<?= htmlspecialchars($dados['N_Registro']) ?>">
  <label>Nº Registro:</label><br>
  <input type="text" name="N_Registro_display" value="<?= htmlspecialchars($dados['N_Registro']) ?>" disabled><br><br>

  <label>Nome do Funcionário:</label><br>
  <input type="text" name="Nome_Funcionario" required value="<?= htmlspecialchars($dados['Nome_Funcionario']) ?>"><br><br>

  <label>Data de Admissão:</label><br>
  <input type="date" name="data_admissao" value="<?= htmlspecialchars($dados['data_admissao']) ?>"><br><br>

  <label>Cargo:</label><br>
  <select name="cargo">
    <option value="">-- Escolher --</option>
    <option value="Auxiliar Administrativo" <?= $dados['cargo']=='Auxiliar Administrativo' ? 'selected' : '' ?>>Auxiliar Administrativo</option>
    <option value="Analista de Projetos" <?= $dados['cargo']=='Analista de Projetos' ? 'selected' : '' ?>>Analista de Projetos</option>
    <option value="Gerente de Projetos" <?= $dados['cargo']=='Gerente de Projetos' ? 'selected' : '' ?>>Gerente de Projetos</option>
    <option value="Programador Jr." <?= $dados['cargo']=='Programador Jr.' ? 'selected' : '' ?>>Programador Jr.</option>
    <!-- adicione outros cargos -->
  </select><br><br>

  <label>Qtde de Salários Mínimos:</label><br>
  <input type="number" step="0.01" name="qtde_salarios" required value="<?= htmlspecialchars($dados['qtde_salarios']) ?>"><br><br>

  <button type="submit">Cadastrar</button>
  <a href="listagem.php">Visualizar Demonstrativos de Pagamentos</a>
</form>
</body>
</html>
