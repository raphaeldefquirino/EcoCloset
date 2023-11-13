<?php 
session_start();

include("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);


$sql = "UPDATE enderecos SET nome_end = '$nome', cep = '$cep', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero', complemento = '$complemento' WHERE idusuario = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_affected_rows($conexao)){

    header("Location: ../new-usu.php");

}

?>