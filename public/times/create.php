<?php
include '../../config/conexao.php';

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO times (nome, cidade) VALUES ('$nome', '$cidade')";

    if ($conn->query($sql)) {
        header("Location: read.php");
        exit;
    } else {
        echo "<div class='alert alert-danger mt-3'>Erro: " . $conn->error . "</div>";
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times</title>
    <link rel="stylesheet" href="../style/style.css">

</head>
<body>
    <div class="container mt-4">
        <h2>Cadastrar Time</h2>

        <form method = "POST" action="create.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" class="form-control" name="cidade" id="cidade" required>
            </div>

            <div class="col-12">
                <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
                <a href="read.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>    
</body>
</html>