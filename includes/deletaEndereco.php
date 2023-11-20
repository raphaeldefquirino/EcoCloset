<?php 
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();
//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//armazena o id do usuário que será obtido pela url da página
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//executa o camando no banco de dados
$sql = "DELETE FROM enderecos WHERE idendereco = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

//direciona o usuário de volta para página
    header("Location: ../new-usu.php");



?>