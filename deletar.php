<?php 
session_start();

include("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM cadastro_prod WHERE idproduto = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_affected_rows($conexao)){

    header("Location: usuario.php");

}

?>