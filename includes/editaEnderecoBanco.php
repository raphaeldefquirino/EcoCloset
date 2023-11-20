<?php 
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//armazena o id do endereço do usuário que será obtido pela url da página
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Obtém os valores enviados pelo usuário no formulário
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);

//armazena o comando que vai ser executado no banco de dados 
$sql = "UPDATE enderecos SET nome_end = '$nome', cep = '$cep', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero', complemento = '$complemento' WHERE idusuario = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

//verifica se o comando SQL foi executado e direciona o usuário de volta para a página
if(mysqli_affected_rows($conexao)){

    header("Location: ../new-usu.php");

}

?>