<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "lugares_db";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
