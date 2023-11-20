<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("includes/conexao.php");

//armazena o id do usuário quando ele fez login 
$id_usuario = $_SESSION['id_usuario'];

//obtém o arquivo que o usuário enviou 
$arquivo = $_FILES['imagemUser'];

//define a pasta onde o arquivo será armazenado 
$pasta = "uploads/";

//obtem o nome original do arquivo e define um id único para o arquivo no banco de dados
$nomeDoArquivo = $arquivo['name'];
$novoNomeDoArquivo = uniqid();
//obtem a extensão do arquivo que o usuário armazenou 
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

//verifica se o arquivo que o usuário enviou é uma imagme ou um arquivo malicioso 
if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg') {
    $_SESSION['erro_perfil'] = true;
    header('Location: new-usu.php');
    exit;
}

//define a forma com que arquvo será armazenado no banco 
$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

//varivael que vai retornar um valor verdadeiro uo falso
$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

// Condição para verificar se a variável retornou verdeiro executar um comando e se retornar falso vai exibir uma mensagem de erro ao enviar arquivo
if ($deu_certo) {

    $id_usuario = $_SESSION['id_usuario'];

    $conexao->query("UPDATE cadastro_usuario SET path_user = '$path' WHERE idusuario = '$id_usuario'");

    header('Location:new-usu.php');
    exit;
} else {
    header('Location: new-usu.php');
    exit;
}
