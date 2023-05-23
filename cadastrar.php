<?php 
session_start();

include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

$sql="SELECT COUNT(*) AS TOTAL FROM cadastro_usuario WHERE email = '$email'";
$result = mysqli_query($conexao, $sql);
$row =  mysqli_fetch_assoc($result);

if($row['TOTAL'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}
 
$sql = "INSERT INTO cadastro_usuario (idusuario, email, senha, nome, telefone, CEP) VALUES ('', '$email', '$senha', '$nome', '$telefone', '$cep')";

if($conexao->query($sql) === TRUE){

    $_SESSION['status_cadastro'] = true;

}

$conexao->close();

header('Location: cadastro.php');
exit;


?>