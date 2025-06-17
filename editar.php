<?php
require 'cadeado.php';
require 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM lugares WHERE id = ? AND usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $_SESSION['usuario_id']);
$stmt->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $feedback = $_POST['feedback'];

    if (empty($nome)) {
        echo "Preencha todos os campos obrigatórios.";
    } else {
        $sql = "UPDATE lugares SET nome=?, feedback=? WHERE id=? AND usuario_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $nome, $feedback, $id, $_SESSION['usuario_id']);
        $stmt->execute();
        header("Location: home.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Lugar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-4">Editar Lugar</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nome do Lugar:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $dados['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Feedback:</label>
            <textarea name="feedback" class="form-control"><?php echo $dados['feedback']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="home.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
