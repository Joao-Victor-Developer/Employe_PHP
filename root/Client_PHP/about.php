<?php
include 'connectionLogin.php';

$n_registro = $_POST["txtRegistro"];
$name_employe = $_POST["txtName"];
$emission_date = $_POST["txtEmission"];
$qtd_sal = $_POST["minimal"];
$position = $_POST["position"];


// consulta para verificar se já existe Email
$sql = "SELECT * FROM employe_db WHERE `n_registro` = '$n_registro'";
$result = mysqli_query($conecta_db, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conecta_db));
}

if (mysqli_num_rows($result) > 0) {
    echo "<center>";
    echo "<hr>";
    echo "CONTA EXISTENTE!";
    echo "</hr>";	
} else {
    $insert = "INSERT INTO employe_db (`txtRegistro`, `txtName`, `txtEmission`, `minimal`) VALUES ('$n_registro', '$name_employe', '$emission_date', '$qtd_sal', '$position')";
    if (mysqli_query($conecta_db, $insert)) {
        echo "<center>";
        echo "<hr>";
        echo "CONTA CADASTRADA";
        echo "</hr>"; 
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conecta_db);
    }
}







?>