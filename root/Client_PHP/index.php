<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de funcionário</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>



  <form name="DataSet" method="post" action="about.php">

<fieldset> 
  <h2>Dados do funcionário</h2>
  <br>
  
  <label for="txtRegistro"> N° Registro</label>
    <input type="text" id="txtRegistro" name="txtRegistro" required>
  
    <label for="txtName"> Nome</label>
    <input type="text"  id="txtName" name="txtName" required>

    <label for="txtEmission">Data de Emissão</label>
    <input type="text"  id="txtEmission" name="txtEmission" required>

  <label for="minimal">QTD salário minimal</label>
  <input type="text" id="minimal" name="minimal" required>

    
    <select name="position" id="position"> <h3>Cargo</h3>
    <option value="Gerente">Gerente</option>
    <option value="Sênior">Sênior</option>
    <option value="Júnior">Júnior</option>
    <option value="Pleno">Pleno</option>
    <option value="Estagiário">Estagiário</option>
    <option value="Analista_de_Sistema">Analista de Sistema</option>
    </select>

<button type="submit" onclick="window.location.href='about.php'">cadastrar</button> <a  href="tableEmploye.php"> Visualizar demonstrativo de pagamentos</a>
</fieldset>
  </form>




</body>
</html>