<?php # Conexão com a Base de Dados
$host = 'localhost';
$dbname = 'todo_app';
$user = 'root';
$pass = '4561230789';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}