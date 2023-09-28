<?php
session_start();

include("includes/conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM cadastro_prod WHERE idproduto = '{$id}'";
$result = mysqli_query($conexao, $sql);
$produto =  mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport"content="width=device-width, initial-scale=1.0"/>
		<title>Pagina Producto</title>
		<link rel="stylesheet" href="estilos/style.css" />
		
	</head>
	<body>
		
            <?php 

            include ('includes/menu.php');
            
            ?>
			
	
		
		

		<main class="mainpagprod">
			<div class="allcontainer">
			<div class="container-img">
				<?php echo '<img src="' . $produto['path'] .'" />'; ?>
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<span>R$ <?php echo $produto['valor']?></span>
					
					
				</div>
				

				

				<div class="container-add-cart">
					
				    <button class="btn-add-to-cart">
						<i class="fa-solid fa-plus"></i>
						Adicionar ao carrinho
					</button>
				</div>

				

				<div class="container-description">
					<div class="title-description">
						<span>Descrição</span>
						
					</div>
					<div class="text-description">
						<p>
							<?php echo $produto['descricao_prod']?>
						</p>
					</div>
				</div>
				<br>

				<div class="condicaoProd">
					<span>Condição: <?php echo $produto['condicao']?> </span>
				</div>
					

				

				<div class="container-social">
					<span>Compartilhar</span>
					<div class="container-buttons-social">
						<a href="#"><i class="fa-solid fa-envelope"></i></a>
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
						
					</div>
				</div>
			</div>
		</div>
		</main>
		<br><br><br>

		

		

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>

        <?php 

include ('includes/footer.php');

?>
		
	</body>
</html>
