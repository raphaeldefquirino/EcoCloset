<?php 
//verifica se o usuário está logado, servirá para as páginas onde o usuário só pode acessar se estvier logado
if (!$_SESSION['email']){
    header('Location: login-usu.php');
    exit;
}
?>