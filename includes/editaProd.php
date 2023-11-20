<?php 
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//armazena o id do produto do usuário que será obtido pela url da página
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Obtém os valores enviados pelo usuário no formulário
$novoPreco = mysqli_real_escape_string($conexao, trim($_POST['novoPreco']));
$novoNome = mysqli_real_escape_string($conexao, trim($_POST['novoNome']));
$novaDesc = mysqli_real_escape_string($conexao, trim($_POST['novaDesc']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$condicao = mysqli_real_escape_string($conexao, trim($_POST['condicao']));
$subcategoria = mysqli_real_escape_string($conexao, trim($_POST['subcategoria']));

//executa o comando SQL no banco de dados
$sql = "UPDATE cadastro_prod SET nome_prod = '$novoNome', descricao_prod = '$novaDesc', valor = '$novoPreco', categoria = '$categoria', subcategoria = '$subcategoria', condicao = '$condicao' WHERE idproduto = '{$id}'";
$resultado = mysqli_query($conexao, $sql);

//verifica se comando SQL foi executa do direciona o usuário de volta para a página 
if(mysqli_affected_rows($conexao)){

    header("Location: ../new-usu.php");

}

?>