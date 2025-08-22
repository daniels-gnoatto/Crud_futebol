<?php
include 'conexao.php';

$posicoes = ['Goleiro','Zagueiro','Lateral-direito','Lateral-esquerdo','Volante','Meia','Atacante'];

$nome = $posicao = $numero_camisa = $time_id = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $posicao = $_POST['posicao'];
    $numero_camisa = $_POST['numero_camisa'];
    $time_id = $_POST['time_id'];

   
    if (empty($nome) || empty($posicao) || empty($time_id)) {
        $erro = "Nome, posição e time são obrigatórios.";
    } elseif (!in_array($posicao, $posicoes)) {
        $erro = "Posição inválida.";
    } elseif (!filter_var($numero_camisa, FILTER_VALIDATE_INT, ["options"=>["min_range"=>1,"max_range"=>99]])) {
        $erro = "Número da camisa deve ser entre 1 e 99.";
    } else {
        $stmt = $conn->prepare("INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $nome, $posicao, $numero_camisa, $time_id);
        $stmt->execute();
        header("Location: list.php");
    }
}
?>

<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Posição: 
    <select name="posicao" required>
        <?php foreach($posicoes as $p) echo "<option>$p</option>"; ?>
    </select><br>
    Número da camisa: <input type="number" name="numero_camisa" min="1" max="99" required><br>
    Time: 
    <select name="time_id" required>
        <?php
        $times = ['1'=>'Palmeiras','2'=>'Flamengo','3'=>'Santos','4'=>'Corinthians','5'=>'Cruzeiro','6'=>'Atlético-MG','7'=>'Internacional','8'=>'Grêmio','9'=>'Fluminense','10'=>'Botafogo','11'=>'Vasco','12'=>'Fortaleza','13'=>'Ceará','14'=>'Bahia','15'=>'Mirassol','16'=>'Sport'];
        foreach($times as $id=>$nome_time) echo "<option value='$id'>$nome_time</option>";
        ?>
    </select><br>
    <button type="submit">Cadastrar</button>
</form>
<?php if($erro) echo "<p style='color:red;'>$erro</p>"; ?>
