<?php
require 'cadeado.php';
require 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM lugares WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meus Lugares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-4">Olá, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
    <a href="adicionar.php" class="btn btn-success my-2">Adicionar Lugar</a>
    <a href="logout.php" class="btn btn-danger my-2">Sair</a>
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Feedback</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['feedback']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="deletar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
