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
		<header>
            <?php 

            include_once('includes/menu.php');
            
            ?>
			
		</header>

		

		<main class="mainpagprod">
			<div class="allcontainer">
			<div class="container-img">
				<img src="img/polonike.jpg" alt="imagen-producto"/>
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<span>$95.00</span>
					
				</div>

				

				<div class="container-add-cart">
					
				    <button class="btn-add-to-cart">
						<i class="fa-solid fa-plus"></i>
						Adicionar ao carrinho
					</button>
				</div>

				<div class="container-description">
					<div class="title-description">
						<h4>Descrição</h4>
						
					</div>
					<div class="text-description">
						<p>
							Lorem ipsum dolor, sit amet consectetur adipisicing
							elit. Laboriosam iure provident atque voluptatibus
							reiciendis quae rerum, maxime placeat enim cupiditate
							voluptatum, temporibus quis iusto. Enim eum qui delectus
							deleniti similique? Lorem, ipsum dolor sit amet
							consectetur adipisicing elit. Sint autem magni earum est
							dolorem saepe perferendis repellat ipsam laudantium cum
							assumenda quidem quam, vero similique? Iusto officiis
							quod blanditiis iste?
						</p>
					</div>
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

		

		

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>

        <?php 

include_once('includes/footer.php');

?>
		
	</body>
</html>
