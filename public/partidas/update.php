<?php

include '../../config/conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $time_casa_id = $_POST['time_casa_id'];
    $time_fora_id = $_POST['time_fora_id'];
    $data_jogo = $_POST['data_jogo'];
    $gols_casa = $_POST['gols_casa'];
    $gols_fora = $_POST['gols_fora'];

    $res_casa = $conn->query("SELECT id FROM times WHERE nome = '$time_casa_id'");
    $res_fora = $conn->query("SELECT id FROM times WHERE nome = '$time_fora_id'");

    if ($res_casa->num_rows > 0 && $res_fora->num_rows > 0) {
    $time_casa_id = $res_casa->fetch_assoc()['id'];
    $time_fora_id = $res_fora->fetch_assoc()['id'];

    $data_jogo = $_POST['data_jogo'];
    $gols_casa = $_POST['gols_casa'];
    $gols_fora = $_POST['gols_fora'];

    $sql = "UPDATE usuarios SET name = ('$time_casa_id', '$time_fora_id', '$data_jogo', '$gols_casa', '$gols_fora') WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}
}

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="create.php">

        <label for="time_casa_id">Mandante:</label>
        <input type="text" name="time_casa_id" required>

        <label for="gols_casa">Gols:</label>
        <input type="number" name="gols_casa" required>

        <label for="time_fora_id">X</label>

        <label for="time_fora_id">Visitante:</label>
        <input type="text" name="time_fora_id" required>

        <label for="gols_fora">Gols:</label>
        <input type="number" name="gols_fora" required>

        <label for="data_jogo">Data do jogo:</label>
        <input type="date" name="data_jogo" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>