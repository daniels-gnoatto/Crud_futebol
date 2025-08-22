<?php
include 'conexao.php';
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM jogadores WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
header("Location: list.php");
$stmt->close();
$conn->close();