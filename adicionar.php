<?php
require 'cadeado.php';
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $feedback = $_POST['feedback'];

    if (empty($nome)) {
        echo "Preencha todos os campos obrigatórios.";
    } else {
        $sql = "INSERT INTO lugares (usuario_id, nome, feedback) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $_SESSION['usuario_id'], $nome, $feedback);
        $stmt->execute();
        header("Location: home.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Lugar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Sistema de Lugares</span>
  </div>
</nav>

<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title">Novo Lugar Visitado</h2>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Nome do Lugar:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feedback:</label>
                    <textarea name="feedback" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="home.php" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
