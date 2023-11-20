<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//armazena o id do usuário quando ele fez login 
$id_usuario = $_SESSION['id_usuario'];

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//Obtém os valores enviados pelo usuário no formulário
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($conexao, trim($_POST['sobrenome']));
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

//armazena o comando que vai ser executado no banco de dados 
$sql = "UPDATE cadastro_usuario SET email = '$email', nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone' WHERE idusuario = '$id_usuario'";

//executa o camando sql e verfica se deu certo
if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    $conexao->close();
    header('Location: ../editaDados.php');
    exit;
} else {
    //caso não tenha dado certo exibe uma mensagem de erro
    echo "Erro ao inserir no banco de dados: " . $conexao->error;
}
