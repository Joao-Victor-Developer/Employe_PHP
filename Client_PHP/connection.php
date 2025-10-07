<?php
$servidor="127.0.0.1";
$usuario="root";
$senha="usbw";
$banco="folha_pagto";

$conecta_db = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conecta_db) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
