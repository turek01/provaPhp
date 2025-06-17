<?php
require 'cadeado.php';
require 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM lugares WHERE id = ? AND usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $_SESSION['usuario_id']);
$stmt->execute();
header("Location: home.php");
?>
