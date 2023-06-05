<?php
session_start();

include('conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: login-usu.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT * FROM cadastro_usuario WHERE email = '{$email}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_fetch_assoc($result); // Correção: usar mysqli_fetch_assoc para obter os dados

if ($row) {
    $_SESSION['id_usuario'] = $row['idusuario'];
    $_SESSION['email'] = $email;
    header('Location: index.php');
    exit();
} else {
    header('Location: login-usu.php');
    exit();
}
?>
