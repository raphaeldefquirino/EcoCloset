<?php 
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o baco de dados
include("conexao.php");

//Verifica se o checkbox dos termos de uso está marcado ou não
if (!isset($_POST['termo'])) {
    $_SESSION['erroTermo1'] = true;
    header('Location: ../cadastro.php');
    exit;
}

//Obtém os valores enviados pelo usuário no formulário
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$confirmaSenha = mysqli_real_escape_string($conexao, trim($_POST['confirmaSenha']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($conexao, trim($_POST['sobrenome']));
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

//faz uma consuta no banco de dados com base no email que usuário digitou 
$sql="SELECT COUNT(*) AS TOTAL FROM cadastro_usuario WHERE email = '$email'";
$result = mysqli_query($conexao, $sql);
$row =  mysqli_fetch_assoc($result);

//verifica se a consulta retornou algum valor e retoruna uma mensagem de erro para o usuáio 
if ($row['TOTAL'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ../cadastro.php');
    exit;
    //verifica se as senhas digitadas pelo usuário conferem     
} else if ($senha !== $confirmaSenha) {
    $_SESSION['senhas_divergem'] = true;
    header('Location: ../cadastro.php');
    exit;
    //caso tenha passado por todas as verificações ele vai inserir no banco de dados as informações fornecidas pelo usuário no banco de dados
} else {
    $sql = "INSERT INTO cadastro_usuario (idusuario, email, senha, nome, sobrenome,telefone, path_user) VALUES ('', '$email', '$senha', '$nome', '$sobrenome', '$telefone', 'uploads/foto-user-exe.png')";
    //verifica se o comando no banco de dados foi executado com sucesso para retornar um mensagem de acordo para o usuário 
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
        $conexao->close();
        header('Location: ../login-usu.php');
        exit;
    } else {
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }
}

?>