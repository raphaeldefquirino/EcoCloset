<?php 
//verifica se existe alguma variável de sessão existente
if(!isset($_SESSION)){
    session_start();
}

//após a verificação encerra todas as variáveis de sessão existentes    
session_destroy();
header("Location: ../index.php");

?>