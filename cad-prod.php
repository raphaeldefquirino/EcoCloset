<?php
//Inicia a sessão para navegar com as variáveis entre as páginas
session_start();

//Inclui o arquivo de conexão de conexão com o banco de dados
include("includes/conexao.php");

//Verifica se o checkbox dos termos de uso está marcado ou não
if (!isset($_POST['termo'])) {
    $_SESSION['erroTermo'] = true;
    header('Location: produto.php');
    exit;
}

//Obtém os valores enviados pelo usuário no formulário
$nome_prod = mysqli_real_escape_string($conexao, trim($_POST['nome_prod']));
$valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
$descr = mysqli_real_escape_string($conexao, trim($_POST['descr']));
$arquivo = $_FILES['arquivo'];
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$subcategoria = mysqli_real_escape_string($conexao, trim($_POST['subcategoria']));
$condicao = mysqli_real_escape_string($conexao, trim($_POST['condicao']));

//Pasta onde os arquivos enviados serão envidados 
$pasta = "uploads/";

//Cria uma variavél para armazernar o nome original do arquivo e cria um novo nome com um id unico para o nome do arquivo
$nomeDoArquivo = $arquivo['name'];
$novoNomeDoArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

//Verifica se arquivo enviado pelo usuário é uma imagem 
if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg') {
    $_SESSION['error_arquivo'] = true;
    header('Location: produto.php');
    exit;}

//Caminho completo onde árquivo será aramazenado 
$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

// Variável que vai retornar um valor de verdadeiro ou falso 
$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

// Condição para verificarse a variável retornou verdeiro executar um comando e se retornar falso vai exibir uma mensagem de erro ao enviar arquivo
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
