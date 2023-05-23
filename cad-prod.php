<?php 
session_start();

include("conexao.php");

$nome_prod =  mysqli_real_escape_string($conexao, trim($_POST['nome_prod']));
$qtd =  mysqli_real_escape_string($conexao, trim($_POST['qtd']));
$valor =  mysqli_real_escape_string($conexao, trim($_POST['valor']));
$descr =  mysqli_real_escape_string($conexao, trim($_POST['descr']));
$telefone =  mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$arquivo = $_FILES['arquivo'];
$categoria =  mysqli_real_escape_string($conexao, trim($_POST['categoria']));




    $pasta = "uploads/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != 'png')
        die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    
    if($deu_certo){
        
        $conexao->query("INSERT INTO cadastro_prod (idproduto, nome_prod, descricao_prod, quantidade, valor, telefone, categoria, path, nome_og_arq) VALUES ('', '$nome_prod', '$descr', '$qtd', '$valor', '$telefone', '$categoria','$path', '$nomeDoArquivo')");

        $_SESSION['prod_cadastrado'] = true;
        header('Location: produto.php');
        exit;
       
    }
    
    else{
        $_SESSION['erro_prod'] = true;
        header('Location: produto.php');
        exit;
    }
    


?>