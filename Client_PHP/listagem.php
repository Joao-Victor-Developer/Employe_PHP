<?php
// Conexão
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conecta_db = mysqli_connect("127.0.0.1", "root", "usbw", "folha_pagto");

if (!$conecta_db) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Consulta
$sql = "SELECT * FROM employe_db";
$result = mysqli_query($conecta_db, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conecta_db));
}

// Exibição dos dados
echo "<center><h2>LISTAGEM DE FUNCIONÁRIOS</h2>";
echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Nº Registro</th>
        <th>Nome</th>
        <th>Data de Emissão</th>
        <th>Cargo</th>
        <th>Qtd Salário</th>
        <th>Salário Bruto</th>
        <th>INSS</th>
        <th>Salário Líquido</th>
      </tr>";

while ($linha = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$linha['n_registro']."</td>";
    echo "<td>".$linha['name_employe']."</td>";
    echo "<td>".$linha['emission_date']."</td>";
    echo "<td>".$linha['position']."</td>";
    echo "<td>".$linha['qtd_sal']."</td>";
    echo "<td>".$linha['qtd_bruto']."</td>";
    echo "<td>".$linha['inss']."</td>";
    echo "<td>".$linha['sal_liq']."</td>";
    echo "</tr>";
}

echo "</table></center>";

mysqli_close($conecta_db);
?>
