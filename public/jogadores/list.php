<?php
include 'conexao.php';


$nome = $_GET['nome'] ?? "";
$posicao = $_GET['posicao'] ?? "";
$time_id = $_GET['time_id'] ?? "";


$sql = "SELECT * FROM jogadores WHERE 1";
$params = [];
$tipos = "";

if($nome != "") { $sql .= " AND nome LIKE ?"; $params[] = "%$nome%"; $tipos.="s"; }
if($posicao != "") { $sql .= " AND posicao=?"; $params[] = $posicao; $tipos.="s"; }
if($time_id != "") { $sql .= " AND time_id=?"; $params[] = $time_id; $tipos.="i"; }

$stmt = $conn->prepare($sql);
if($params) $stmt->bind_param($tipos, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$times = ['1'=>'Palmeiras','2'=>'Flamengo','3'=>'Santos','4'=>'Corinthians','5'=>'Cruzeiro','6'=>'Atlético-MG','7'=>'Internacional','8'=>'Grêmio','9'=>'Fluminense','10'=>'Botafogo','11'=>'Vasco','12'=>'Fortaleza','13'=>'Ceará','14'=>'Bahia','15'=>'Mirassol','16'=>'Sport'];
$posicoes = ['Goleiro','Zagueiro','Lateral-direito','Lateral-esquerdo','Volante','Meia','Atacante'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Jogadores</title>

</head>
<body>

<h1>Lista de Jogadores</h1>

<form method="get">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>">
    Posição: 
    <select name="posicao">
        <option value="">Todos</option>
        <?php foreach($posicoes as $p): ?>
            <option value="<?= $p ?>" <?= ($posicao==$p)?'selected':'' ?>><?= $p ?></option>
        <?php endforeach; ?>
    </select>
    Time:
    <select name="time_id">
        <option value="">Todos</option>
        <?php foreach($times as $id=>$nome_time): ?>
            <option value="<?= $id ?>" <?= ($time_id==$id)?'selected':'' ?>><?= $nome_time ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filtrar</button>
</form>

<table>
    <tr>
        <th>Nome</th>
        <th>Posição</th>
        <th>Camisa</th>
        <th>Time</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['nome']) ?></td>
        <td><?= htmlspecialchars($row['posicao']) ?></td>
        <td><?= $row['numero_camisa'] ?></td>
        <td><?= $times[$row['time_id']] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> | 
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
