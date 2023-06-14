<?php 

define('HOST', 'localhost');
define('USUARIO', 'u413309708_raphael');
define('SENHA', 'Informaticos@2023');
define('DB', 'u413309708_ecocloset');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar ao banco de dados');



?>