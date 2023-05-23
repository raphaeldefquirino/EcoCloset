<?php 
session_start();
include ('verifica-login.php');
?>

<h2>Olá, <?php echo $_SESSION['email'];?></h2>