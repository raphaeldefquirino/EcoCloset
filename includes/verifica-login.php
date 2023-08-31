<?php 
if (!$_SESSION['email']){
    header('Location: login-usu.php');
    exit;
}
?>