<?php 
session_start();

include("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM enderecos WHERE idendereco = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

    header("Location: ../new-usu.php");



?>