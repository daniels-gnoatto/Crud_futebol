<?php
include 'conexao.php';

$posicoes = ['Goleiro','Zagueiro','Lateral-direito','Lateral-esquerdo','Volante','Meia','Atacante'];
$times = ['1'=>'Palmeiras','2'=>'Flamengo','3'=>'Santos','4'=>'Corinthians','5'=>'Cruzeiro','6'=>'Atlético-MG','7'=>'Internacional','8'=>'Grêmio','9'=>'Fluminense','10'=>'Botafogo','11'=>'Vasco','12'=>'Fortaleza','13'=>'Ceará','14'=>'Bahia','15'=>'Mirassol','16'=>'Sport'];

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM jogadores WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

$erro = "";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nome = $_POST['nome'];
    $posicao = $_POST['posicao'];
    $numero_camisa = $_POST['numero_camisa'];
    $time_id = $_POST['time_id'];

    if (empty($nome) || empty($posicao) || empty($time_id)) $erro="Nome, posição e time são obrigatórios.";
    elseif (!in_array($posicao, $posicoes)) $erro="Posição inválida.";
    elseif (!filter_var($numero_camisa,FILTER_VALIDATE_INT,["options"=>["min_range"=>1,"max_range"=>99]])) $erro="Número da camisa inválido.";
    else {
        $stmt2 = $conn->prepare("UPDATE jogadores SET nome=?, posicao=?, numero_camisa=?, time_id=? WHERE id=?");
        $stmt2->bind_param("ssiii",$nome,$posicao,$numero_camisa,$time_id,$id);
        $stmt2->execute();
        header("Location: list.php");
    }
}
?>

<form method="post">
    Nome: <input type="text" name="nome" value="<?= $row['nome'] ?>" required><br>
    Posição: 
    <select name="posicao" required>
        <?php foreach($posicoes as $p) echo "<option ".($row['posicao']==$p?'selected':'').">$p</option>"; ?>
    </select><br>
    Número da camisa: <input type="number" name="numero_camisa" value="<?= $row['numero_camisa'] ?>" min="1" max="99" required><br>
    Time: 
    <select name="time_id" required>
        <?php foreach($times as $id_t=>$nome_time) echo "<option value='$id_t' ".($row['time_id']==$id_t?'selected':'').">$nome_time</option>"; ?>
    </select><br>
    <button type="submit">Salvar</button>
</form>
<?php if($erro) echo "<p style='color:red;'>$erro</p>"; ?>
