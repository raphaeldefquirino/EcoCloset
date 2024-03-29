<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o banco de dados
include("includes/conexao.php");

//armazena o id do produto
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//comando SQL para fazer uma consulta na tabela de produtos cadastrados com base no id do produto
$sql = "SELECT * FROM cadastro_prod WHERE idproduto = '{$id}'";
$result = mysqli_query($conexao, $sql);
$produto =  mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="estilos/style.css">
	<link rel="stylesheet" href="estilos/media-query.css">
	<script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
	<title>Pagina Produto</title>
	<link rel="stylesheet" href="estilos/style.css" />

</head>

<body>

	<?php
	//inclui o arquivo do menu
	include('menu.php');

	?>





	<main class="mainpagprod">
		<div class="allcontainer">
			<div class="container-img">
				<?php echo '<img src="' . $produto['path'] . '" />'; ?>
			</div>
			<div class="container-info-product">
				<div class="nome-prod">
					<p ><?php echo $produto['nome_prod'] ?></p>
				</div>
				<div class="container-price">
					<span>R$ <?php echo $produto['valor'] ?></span>


				</div>




				<div class="container-add-cart">
					<?php echo '<a href="adicionaCarrinho.php?idproduto=' . $produto['idproduto'] . '" style = "text-decoration: none">' ?>
					<button class="btn-add-to-cart">
						<i class="fa-solid fa-plus"></i>
						  Adicionar ao carrinho
					</button>
					</a>
				</div>



				<div class="container-description">
					<div class="title-description">
						<span>Descrição</span>

					</div>
					<div class="text-description">
						<p>
							<?php echo $produto['descricao_prod'] ?>
						</p>
					</div>
				</div>
				<br>

				<div class="condicaoProd">
					<span>Condição: <?php echo $produto['condicao'] ?> </span>
				</div>




				
			</div>
		</div>
	</main>
	<br><br><br>





	<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>

	<?php
	//inclui o arquivo do rodapé 
	include('includes/footer.php');

	?>

</body>

</html>