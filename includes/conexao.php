<?php 
//define o host do banco de dados
define('HOST', 'localhost');
//define o usurio do banco de dados
define('USUARIO', 'root');
//define a senha do banco de dados
define('SENHA', '');
//define o nome do banco de dados
define('DB', 'ecocloset');
//faz a conexão com o banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar ao banco de dados');



?>