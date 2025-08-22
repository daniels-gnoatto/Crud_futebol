<?php

include '../../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $time_casa_id = $_POST['time_casa_id'];
    $time_fora_id = $_POST['time_fora_id'];
    $data_jogo = $_POST['data_jogo'];
    $gols_casa = $_POST['gols_casa'];
    $gols_fora = $_POST['gols_fora'];

    $sql = " INSERT INTO partidas (time_casa_id,time_fora_id,data_jogo,gols_casa,gols_fora) VALUE ('$mandante','$visitante', '$data_jogo', '$gols_casa', '$gols_fora' )";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="create.php">

        <label for="time_casa_id">Mandante:</label>
        <input type="text" name="time_casa_id" required>

        <label for="time_fora_id">Visitante:</label>
        <input type="text" name="time_fora_id" required>

        <label for="data_jogo">Data do jogo:</label>
        <input type="date" name="data_jogo" required>

        <label for="gols_casa">Visitante:</label>
        <input type="number" name="gols_casa" required>

        <label for="gols_fora">Visitante:</label>
        <input type="number" name="gols_fora" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>