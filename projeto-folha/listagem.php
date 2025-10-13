<?php
require 'config.php';

$filtro = $_GET['filtro'] ?? '';
$params = [];
$sql = "SELECT * FROM tb_funcionarios";

if ($filtro !== '') {
    $sql .= " WHERE Nome_Funcionario LIKE :filtro";
    $params[':filtro'] = "%$filtro%";
}
$sql .= " ORDER BY N_Registro ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$rows = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Demonstrativo de Rendimentos</title></head>
<body>
<h2>Demonstrativo de Rendimentos Mensais</h2>

<form method="get" action="">
  <label>Digite o nome do funcionário:</label>
  <input type="text" name="filtro" value="<?= htmlspecialchars($filtro) ?>">
  <button type="submit">Filtrar</button>
  <a href="home_funcionarios.php">Voltar</a>
</form>

<table border="1" cellpadding="6" cellspacing="0">
  <thead>
    <tr>
      <th>Nº Registro</th>
      <th>Nome</th>
      <th>Data Admissão</th>
      <th>Cargo</th>
      <th>Salário Bruto</th>
      <th>INSS</th>
      <th>Salário Líquido</th>
      <th>Apagar</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($rows as $r): ?>
    <tr>
      <td><?= $r['N_Registro'] ?></td>
      <td><?= htmlspecialchars($r['Nome_Funcionario']) ?></td>
      <td><?= $r['data_admissao'] ?></td>
      <td><?= htmlspecialchars($r['cargo']) ?></td>
      <td>R$ <?= number_format($r['salario_bruto'],2,',','.') ?></td>
      <td><?= $r['inss'] > 0 ? 'R$ '.number_format($r['inss'],2,',','.') : 'Isento' ?></td>
      <td>R$ <?= number_format($r['salario_liquido'],2,',','.') ?></td>
      <td><a href="excluir.php?id=<?= $r['N_Registro'] ?>" onclick="return confirm('Confirma exclusão?')">X</a></td>
      <td><a href="home_funcionarios.php?id=<?= $r['N_Registro'] ?>">Editar</a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>

<?php if (isset($_GET['msg'])): ?>
  <p style="color:green;"><?= htmlspecialchars($_GET['msg']) ?></p>
<?php endif; ?>
</body>
</html>
