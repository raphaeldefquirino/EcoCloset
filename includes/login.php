<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include('conexao.php');

//verifica se campo do email ou da senha estão vazios
if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: login-usu.php');
    exit();
}

//obtem do formulário os campos do email e senha digitados pelo usuário
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//armazena o comando e resulta da consulta SQL no banco de dados
$query = "SELECT * FROM cadastro_usuario WHERE email = '{$email}' and senha = '{$senha}'";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result); 

//verifica se a consulta retornou algum valor verdadeiro e armazena o id do usuário e email em variáveis de sessão
if ($row) {
    $_SESSION['id_usuario'] = $row['idusuario'];
    $_SESSION['email'] = $email;
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../login-usu.php');
    exit();
}
?>
