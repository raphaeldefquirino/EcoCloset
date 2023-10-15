<?php 
session_start();

include("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$novoPreco = mysqli_real_escape_string($conexao, trim($_POST['novoPreco']));
$novoNome = mysqli_real_escape_string($conexao, trim($_POST['novoNome']));
$novaDesc = mysqli_real_escape_string($conexao, trim($_POST['novaDesc']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$condicao = mysqli_real_escape_string($conexao, trim($_POST['condicao']));
$subcategoria = mysqli_real_escape_string($conexao, trim($_POST['subcategoria']));


$sql = "UPDATE cadastro_prod SET nome_prod = '$novoNome', descricao_prod = '$novaDesc', valor = '$novoPreco', categoria = '$categoria', subcategoria = '$subcategoria', condicao = '$condicao' WHERE idproduto = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_affected_rows($conexao)){

    header("Location: ../new-usu.php");

}

?>