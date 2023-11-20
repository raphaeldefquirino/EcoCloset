<?php 
//Incia a sessão para navegar com as variáveis entre as páginas 
session_start();

//Inclui o  arquivo de conexão com o banco de dados
include('includes/conexao.php');

//armazena o id do produto que é obtido na URL da página 
$idproduto = $_GET['idproduto'];

//armazena o id do usuário que foi obtido quando o usuário se loga 
$id_usuario = $_SESSION['id_usuario'];

//armazena o comando que vai ser executado no banco de dados 
$sql = "INSERT INTO pedidos (idpedido, idusuario, status, idproduto) VALUES ('', '$id_usuario', 'carrinho', '$idproduto')";

//executa o camando sql e verfica se deu certo
    if ($conexao->query($sql) === TRUE) {
        $conexao->close();
        header('Location: new-usu.php');
        exit;
    } else {
        //caso não tenha dado certo exibe uma mensagem de erro
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }


?>