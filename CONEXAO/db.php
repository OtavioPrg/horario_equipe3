<?php
$host = 'localhost';
$db = 'ControleAulas';
$user = 'root'; // substitua pelo seu usuário do MySQL
$pass = ''; // substitua pela sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
