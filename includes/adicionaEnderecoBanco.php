<?php 
session_start();

include("conexao.php");

$id_usuario = $_SESSION['id_usuario'];

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);




    $sql = "INSERT INTO enderecos (idendereco, nome_end, cep, cidade, bairro, rua, numero, complemento, idusuario) VALUES ('', '$nome', '$cep', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$id_usuario')";

    if ($conexao->query($sql) === TRUE) {

        $_SESSION['status_endereco'] = true;
        $conexao->close();
        header('Location: ../adicionaEndereco.php');
        exit;

    } else {
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }
?>