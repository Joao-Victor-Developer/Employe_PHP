<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Funcionário</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

<form method="post" action="gravar.php">
    <fieldset>
      <h2>Cadastro de Funcionário</h2>
      <br>

      <label for="n_registro">N° Registro</label>
      <input type="text" id="n_registro" name="n_registro" required>

      <label for="name_employe">Nome</label>
      <input type="text" id="name_employe" name="name_employe" required>

      <label for="emission_date">Data de Admissão</label>
      <input type="date" id="emission_date" name="emission_date" required>

      <label for="qtd_sal">Quantidade de Salários Mínimos</label>
      <input type="number" id="qtd_sal" name="qtd_sal" required min="1">

      <label for="position">Cargo</label>
      <select name="position" id="position" required>
        <option value="">Selecione...</option>
        <option value="Gerente">Gerente</option>
        <option value="Sênior">Sênior</option>
        <option value="Pleno">Pleno</option>
        <option value="Júnior">Júnior</option>
        <option value="Estagiário">Estagiário</option>
        <option value="Analista de Sistema">Analista de Sistema</option>
      </select>

      <br><br>
      <button type="submit">Cadastrar</button>
      <a href="listagem.php">Visualizar Demonstrativo de Pagamentos</a>
    </fieldset>
  </form>

</body>
</html>
