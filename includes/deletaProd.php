<?php 
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//armazena o id do produto que será obtido pela url da página
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//deleta o produto na tebela de produtos no banco de dados
$sql = "DELETE FROM cadastro_prod WHERE idproduto = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

//deleta o produto na tebela do carrinho de compras 
$sql2 = "DELETE FROM pedidos WHERE idproduto = '{$id}'";
$resultado2 = mysqli_query($conexao, $sql2);

//direciona o usuário de volta para a página 
    header("Location: ../new-usu.php");



?>