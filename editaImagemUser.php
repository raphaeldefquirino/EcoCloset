<?php
session_start();

include("includes/conexao.php");

$id_usuario = $_SESSION['id_usuario'];

$arquivo = $_FILES['imagemUser'];

$pasta = "uploads/";

$nomeDoArquivo = $arquivo['name'];
$novoNomeDoArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg') {
    echo 'Tipo de arquivo não aceito'; 
}

$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

if ($deu_certo) {

    $id_usuario = $_SESSION['id_usuario'];

    $conexao->query("UPDATE cadastro_usuario SET path_user = '$path' WHERE idusuario = '$id_usuario'");

    header('Location:new-usu.php');
    exit;
} else {
    header('Location: new-usu.php');
    exit;
}
