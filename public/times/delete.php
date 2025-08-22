<?php 
include  '../../config/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM times WHERE id=$id";
if ($conn->query($sql)) {
    header("Location: read.php");
    exit;
} else {
    echo "<div class='alert alert-danger mt-3'>Erro: " . $conn->error . "</div>";
}
?>