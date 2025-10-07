<?php
// Conexão
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

// Recebendo dados do formulário
$n_registro    = $_POST["txtRegistro"];
$name_employe  = $_POST["txtName"];
$emission_date = $_POST["txtEmission"];
$position      = $_POST["position"];
$qtd_sal       = $_POST["minimal"];
$qtd_bruto     = $_POST["bruto"];
$inss          = $_POST["inss"];
$sal_liq       = $_POST["liquido"];

// Verifica se já existe funcionário com o mesmo número de registro
$sql = "SELECT * FROM employe_db WHERE n_registro = '$n_registro'";
$result = mysqli_query($conecta_db, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conecta_db));
}

// Se já existir
if (mysqli_num_rows($result) > 0) {
    echo "<center><hr>CONTA EXISTENTE!</hr></center>";
} else {
    // Inserção
    $insert = "INSERT INTO employe_db 
    (n_registro, name_employe, emission_date, position, qtd_sal, qtd_bruto, inss, sal_liq)
    VALUES 
    ('$n_registro', '$name_employe', '$emission_date', '$position', '$qtd_sal', '$qtd_bruto', '$inss', '$sal_liq')";
    
    if (mysqli_query($conecta_db, $insert)) {
        echo "<center><hr>CONTA CADASTRADA</hr></center>";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conecta_db);
    }
}

mysqli_close($conecta_db);
?>
