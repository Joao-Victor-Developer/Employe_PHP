<?php
// config.php
$host = '127.0.0.1';
$db   = 'Folha_Pagto';
$user = 'root';
$pass = 'usbw'; // senha do seu mysql (ajuste se tiver)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // levanta exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Não coloque detalhes em produção
    exit('Erro conexão: ' . $e->getMessage());
}
?>
