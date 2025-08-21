<?php
$host = "localhost";
$usuario = "root";   // padrão do XAMPP
$senha = "";       // geralmente sem senha no XAMPP
$db   = "futebol_db";

$conn = new mysqli($host, $$usuario, $senha, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>