<?php
session_start();
include('includes/conexao.php');
$search = mysqli_real_escape_string($conexao, trim($_POST['search']));
$buscar = mysqli_real_escape_string($conexao, trim($_POST['buscar']));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="estilos/style.css">
	<link rel="stylesheet" href="estilos/media-query.css">
	<script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
	<title>Document</title>
</head>

<body class="body-searchpage">
	<?php
	include("menu.php")
	?>
	<?php
	$consulta = "SELECT * FROM cadastro_prod WHERE nome_prod LIKE '%" .$search. "%'";
	$resultado = mysqli_query($conexao, $consulta);

	if (mysqli_num_rows($resultado) > 0) {
		echo  ' <div class="container">';
		while ($produto = mysqli_fetch_assoc($resultado)) {

			echo '<a href="paginaprod.php?id=' . $produto['idproduto'] . '"><div class="clothing-item">';
			echo '<img src="' . $produto['path'] . '" alt="Calça jeans">';
			echo '<br>';
			echo '<br>';
			echo '<div class="btncarrinho"><a href="#"><span class="material-symbols-outlined">add_shopping_cart</span></a></div>';
			echo '<div class="clothing-details">';
			echo '<h3 class="h3produtos">' . $produto['nome_prod'] . '</h3>';
			echo ' <p class="clothing-price"><strong>R$' . $produto['valor'] . ' </strong></p>';
			echo '</div>';
			echo '</div>';
			echo '</a>';
		}
		echo  '</div>';
	} else {
		echo '<div class = "erro-prod-search">';
		echo '<p>Ops, parece que não encontramos nenhum produto com nome especificado!</p>';
		echo '</div>';
	}


	mysqli_close($conexao);
	?>

	<?php
	include('includes/footer.php');
	?>
</body>

</html>