<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//armazena o id do usuário quando ele fez login 
$id_usuario = $_SESSION['id_usuario'];

//Obtém os valores enviados pelo usuário no formulário
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);

//armazena o comando que vai ser executado no banco de dados 
$sql = "INSERT INTO enderecos (idendereco, nome_end, cep, cidade, bairro, rua, numero, complemento, idusuario) VALUES ('', '$nome', '$cep', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$id_usuario')";

//executa o camando sql e verfica se deu certo
if ($conexao->query($sql) === TRUE) {

    $_SESSION['status_endereco'] = true;
    $conexao->close();
    header('Location: ../adicionaEndereco.php');
    exit;
} else {
    //caso não tenha dado certo exibe uma mensagem de erro
    echo "Erro ao inserir no banco de dados: " . $conexao->error;
}
