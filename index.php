<!DOCTYPE html>
<html lang="pt_br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="estilos/style.css">
  <link rel="stylesheet" href="estilos/media-query.css">
  <script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
  <title>EcoCloset</title>
</head>

<body>

  <?php

  include("menu.php");

  ?>

  <!-- Inicio imagem de fundo -->
  <div class="imagem">

    <picture>
      <source media="(min-width:768px )" srcset="imagens/imagem-fundo-grande.png">
      <img src="imagens/imagem-fundo-pq.jpg" alt="Imagem">
    </picture>
    <!-- Fim imagem de fundo -->
    <div class="texto">
      <p id="maior">Seu brechó online</p>
      <p id="menor">"Roupas usadas histórias renovadas!"</p>
    </div>
  </div>

  <!-- Inicio da construção do "Atalhos de categorias"-->

  <div class="Roupas-Categorias">
    <h1 style = "text-decoration: none;">ROUPAS</h1>
    <br>
  </div>
  <div class="container-conteudo-Categorias">
    <div class="Imagem1-Categorias">
      <a href="feminina.php">
        <div class="Imagem-container-Categorias">
          <img src="imagens/pexels-jeff-denlea-5231463.jpg" alt="Imagem feminina" height="300" width="300">
        </div>
        <div class="Text-Imagem-Categorias">
          <h2>Femininas</h2>
        </div>
      </a>
    </div>

    <div class="Imagem2-Categorias">
      <a href="kids.php">
        <div class="Imagem-container-Categorias">
          <img src="imagens/meninos da criança dois tons bolso com aba Camisa & Shorts sem camiseta.jfif" alt="Imagem masculina"  height="300" width="300" >
        </div>
        <div class="Text-Imagem-Categorias">
          <h2>Kids</h2>
        </div>
      </a>
    </div>

    <div class="Imagem2-Categorias">
      <a href="masculina.php">
        <div class="Imagem-container-Categorias">
          <img src="imagens/pexels-lucxama-sylvain-2765557.jpg" alt="Imagem masculina" height="300" width="300">
        </div>
        <div class="Text-Imagem-Categorias">
          <h2>Masculinas</h2>
        </div>
      </a>
    </div>

  </div>

  <!-------------- Fim da construção do "Atalhos de categorias"-------------->

  <!-- Inicio da construção do "Sobre nós"-->

  <div class="SobrenosTexto" id="sobrenos">
    <br>
    <h1>Sobre nós</h1>
    <br>
    <br>
  </div>

  <div class="conteudo-container-sobrenos">

    <div class="TextoSobrenos">

      <p>Nosso projeto é uma iniciativa escolar de uma plataforma online para compras e vendas de roupas e acessórios de segunda mão, com o objetivo de incentivar um consumo mais consciente e sustentável. Ao comprar roupas usadas, os usuários podem economizar dinheiro e ter acesso a peças únicas e de qualidade, ao mesmo tempo em que contribuem para a redução do impacto ambiental causado pelo consumo excessivo de roupas.
        <br><br>
        Acreditamos que nosso projeto pode ser uma ótima opção para quem deseja vender suas roupas usadas e obter uma renda extra de forma prática e segura. Além disso, o nosso site pode atender a uma demanda crescente por consumo consciente e sustentável, oferecendo produtos de qualidade e estilo para os usuários.
        <br><br>
        Também queremos promover práticas de moda sustentáveis, oferecendo recursos para reduzir o desperdício e tomar decisões de compras mais conscientes. Teremos uma página dedicada a roupas orgânicas e biodegradáveis, e estaremos sempre em busca de maneiras de melhorar a sustentabilidade do nosso projeto.
        <br><br>
        Com o nosso projeto, esperamos contribuir para um mundo mais sustentável e consciente, oferecendo aos usuários uma alternativa acessível e prática para o consumo de roupas e acessórios.
      </p>
    </div>

    <div class="ImagemSobrenos">

      <img src="imagens/pexels-david-bartus-615003.jpg" alt="Image" height="850" width="550">

    </div>
  </div>
  <br>

  <!-- Fim da construção do "Sobre nós"-->

   <!-- Início da construção do "Carrossel de criadores" -->
   <div class="textocriadores">
      <h1>Criadores</h1>
  </div>
   
   <section id="testimonial_area" class="section_padding">
				<div class="container-pag-criadores">
					<div class="row">
						<div class="col-md-12">
							<div class="testmonial_slider_area text-center owl-carousel">
								<div class="box-area">	
									<div class="img-area">
										<img src="imagens/criador1.jpg" alt="">
									</div>	
                  <br>
								
									<h5>Arthur Bergamaço Alves</h5>
                  
                  
																		
									<p class="content">
										Lorem ipsum dolor sit amet consectetur adipisicing elit. At cumque illo, ea unde rem natus voluptatum accusamus laboriosam quis autem odio aliquid quod veniam sed sint error non ipsum odit.
										
									</p>
                  
                 
									<h6 class="socials">
									    <i class="fa fa-instagram"></i>
									    <i class="fa fa-facebook"></i>
									    <i class="fa fa-linkedin"></i>
									   
									</h6>
								</div> 
							
								<div class="box-area">	
									<div class="img-area">
										<img src="imagens/criador2.jpg" alt="">
									</div>
										<br>
									<h5>Nicolas de Lima Pinheiro</h5>
                  
																		
									<p class="content">
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nisi dolores perferendis asperiores repudiandae voluptatum vero placeat, iste id ipsum necessitatibus culpa tenetur aliquid, aliquam atque magnam amet sit facilis!
								
									</p>
									<h6 class="socials">
									    <i class="fa fa-instagram"></i>
									    <i class="fa fa-facebook"></i>
									    <i class="fa fa-linkedin"></i>
									  
									</h6>
								</div> 
							
								<div class="box-area">	
									<div class="img-area">
										<img src="imagens/criador3.jpg" alt="">
									</div>	
									<br>
									<h5>Rapahel de França Quirino</h5>
                  
									
									<p class="content">
										Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi quod fugit soluta quibusdam inventore iure quis vitae, exercitationem cupiditate sunt a illo accusamus incidunt expedita molestiae minima, doloremque dolore vel?
									
									</p>
									<h6 class="socials">
									    <i class="fa fa-instagram"></i>
									    <i class="fa fa-facebook"></i>
									    <i class="fa fa-linkedin"></i>
									   
									</h6>
								</div> 
							
							 
							</div>
						</div>
					</div>
				</div>
			</section>
		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
		<script>
        $(".testmonial_slider_area").owlCarousel({
				
				slideSpeed:1000,
				items : 1,
				loop: true,
				nav:true,
				navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
				margin: 30,
				dots: true,
				responsive:{
					320:{
						items:1
					},
					767:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
				
			});
    </script>
    <br><br><br>



        

     
  <!-- Fim da construção do "Carrossel de criadores" -->
  <?php

  include("includes/footer.php")

  ?>

</body>
