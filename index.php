<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Sistema de Lugares</span>
  </div>
</nav>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="card-title text-center">Login</h2>
            <form method="post" action="verificar.php">
                <div class="mb-3">
                    <label class="form-label">Nome de Usuário:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Senha:</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                <a href="cadastro.php" class="btn btn-link w-100 text-center mt-2">Cadastrar-se</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
