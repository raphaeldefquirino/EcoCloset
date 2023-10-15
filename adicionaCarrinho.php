<?php 
session_start();
include('includes/conexao.php');

$idproduto = $_GET['idproduto'];
$id_usuario = $_SESSION['id_usuario'];

$sql = "INSERT INTO pedidos (idpedido, idusuario, status, idproduto) VALUES ('', '$id_usuario', 'carrinho', '$idproduto')";
    if ($conexao->query($sql) === TRUE) {
        $conexao->close();
        header('Location: new-usu.php');
        exit;
    } else {
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }


?>