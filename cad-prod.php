<?php
session_start();

include("includes/conexao.php");

$nome_prod = mysqli_real_escape_string($conexao, trim($_POST['nome_prod']));
$valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
$descr = mysqli_real_escape_string($conexao, trim($_POST['descr']));
$arquivo = $_FILES['arquivo'];
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$subcategoria = mysqli_real_escape_string($conexao, trim($_POST['subcategoria']));
$condicao = mysqli_real_escape_string($conexao, trim($_POST['condicao']));

$pasta = "uploads/";

$nomeDoArquivo = $arquivo['name'];
$novoNomeDoArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg') {
    die("Tipo de arquivo não aceito");
}

$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

if ($deu_certo) {

    $id_usuario = $_SESSION['id_usuario'];

    $conexao->query("INSERT INTO cadastro_prod (idproduto, nome_prod, descricao_prod, valor, categoria, subcategoria, condicao ,path, nome_og_arq, id_usu) VALUES ('', '$nome_prod', '$descr', '$valor', '$categoria', '$subcategoria', '$condicao','$path', '$nomeDoArquivo', '$id_usuario')");

    $_SESSION['prod_cadastrado'] = true;
    header('Location: produto.php');
    exit;
} else {
    $_SESSION['erro_prod'] = true;
    header('Location: produto.php');
    exit;
}
