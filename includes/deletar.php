<?php 
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//armazena o id do produto que será obtido pela url da página
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//executa a exclusão do produto na tebela do carrinhio de compras no banco de dados
$sql = "DELETE FROM pedidos WHERE idproduto = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

//verifica se o produto foi excluido do banco de dados e direciona o usuário de volta para página
if(mysqli_affected_rows($conexao)){

    header("Location: ../new-usu.php");

}

?>