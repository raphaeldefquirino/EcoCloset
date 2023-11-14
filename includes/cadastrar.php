<?php 
session_start();

include("conexao.php");

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$confirmaSenha = mysqli_real_escape_string($conexao, trim($_POST['confirmaSenha']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($conexao, trim($_POST['sobrenome']));
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

$sql="SELECT COUNT(*) AS TOTAL FROM cadastro_usuario WHERE email = '$email'";
$result = mysqli_query($conexao, $sql);
$row =  mysqli_fetch_assoc($result);

if ($row['TOTAL'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ../cadastro.php');
    exit;
} else if ($senha !== $confirmaSenha) {
    $_SESSION['senhas_divergem'] = true;
    header('Location: ../cadastro.php');
    exit;
} else {
    $sql = "INSERT INTO cadastro_usuario (idusuario, email, senha, nome, sobrenome,telefone, path_user) VALUES ('', '$email', '$senha', '$nome', '$sobrenome', '$telefone', 'uploads/foto-user-exe.png')";
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