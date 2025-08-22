<?php

include '../../config/conexao.php';

$sql = "SELECT * FROM partidas";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> time_casa_id </th>
            <th> time_fora_id </th>
            <th> data_jogo </th>
            <th> gols_casa </th>
            <th> gols_fora </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['time_casa_id']} </td>
                <td> {$row['time_fora_id']} </td>
                <td> {$row['data_jogo']} </td>
                <td> {$row['gols_casa']} </td>
                <td> {$row['gols_fora']} </td>
                <td> 
                    <a href='update.php?id={$row['id']}'>Editar<a>
                    <a href='delete.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='create.php'>Inserir novo Registro</a>";