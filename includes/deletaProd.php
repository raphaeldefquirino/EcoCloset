<?php 
session_start();

include("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM cadastro_prod WHERE idproduto = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

$sql2 = "DELETE FROM pedidos WHERE idproduto = '{$id}'";
$resultado2 = mysqli_query($conexao, $sql2);

    header("Location: ../new-usu.php");



?>