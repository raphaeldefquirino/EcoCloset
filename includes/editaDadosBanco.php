<?php 
session_start();

$id_usuario = $_SESSION['id_usuario'];

include("conexao.php");

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($conexao, trim($_POST['sobrenome']));
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);

    $sql = "UPDATE cadastro_usuario SET email = '$email', nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone', CEP = '$cep', endereco = '$endereco', complemento = '$complemento' WHERE idusuario = '$id_usuario'";

    if ($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
        $conexao->close();
        header('Location: ../editaDados.php');
        exit;
    } else {
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }




?>