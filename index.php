<!DOCTYPE html>
<html lang="pt_br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
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
    <h1>ROUPAS</h1>
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
  </div>

  <div class="conteudo-container">

    <div class="TextoSobre">

      <p>Nosso projeto é uma iniciativa escolar de uma plataforma online para compras e vendas de roupas e acessórios de segunda mão, com o objetivo de incentivar um consumo mais consciente e sustentável. Ao comprar roupas usadas, os usuários podem economizar dinheiro e ter acesso a peças únicas e de qualidade, ao mesmo tempo em que contribuem para a redução do impacto ambiental causado pelo consumo excessivo de roupas.
        <br><br>
        Acreditamos que nosso projeto pode ser uma ótima opção para quem deseja vender suas roupas usadas e obter uma renda extra de forma prática e segura. Além disso, o nosso site pode atender a uma demanda crescente por consumo consciente e sustentável, oferecendo produtos de qualidade e estilo para os usuários.
        <br><br>
        Também queremos promover práticas de moda sustentáveis, oferecendo recursos para reduzir o desperdício e tomar decisões de compras mais conscientes. Teremos uma página dedicada a roupas orgânicas e biodegradáveis, e estaremos sempre em busca de maneiras de melhorar a sustentabilidade do nosso projeto.
        <br><br>
        Com o nosso projeto, esperamos contribuir para um mundo mais sustentável e consciente, oferecendo aos usuários uma alternativa acessível e prática para o consumo de roupas e acessórios.
      </p>
    </div>

    <div class="ImagemSobre">

      <img src="imagens/pexels-david-bartus-615003.jpg" alt="Image" height="600" width="450">

    </div>
  </div>

  <!-- Fim da construção do "Sobre nós"-->

  <!-- Início da construção do "Carrossel de criadores" -->
  <div class="titulo-perfil">
    <h1>Criadores</h1>

    <div class="container-perfil">
      <div class="indicador-perfil">
        <span class="btn-perfil active-perfil"></span>
        <span class="btn-perfil"></span>
        <span class="btn-perfil"></span>
      </div>
      <div class="testimonial-perfil">
        <div class="slide-row" id="slide">
          <div class="slide-col">
            <div class="perfil-imagem">
              <img src="imagens/criador1.jpg" alt="" width="400px" height="400px">
            </div>

            <div class="perfil-text">
              <p>Olá! Eu sou Arthur Bergamaço Alves, um dos criadores e integrante do grupo EcoCloset. Tenho 18 anos e estou cursando o 2TID na escola Alcina Dantas Feijão.
                <br>
                <p2>#NEVER GIVE UP</p2>
              </p>
              <h3>Arthur</h3>
              <p>EcoCloset</p>
            </div>
          </div>

          <div class="slide-col">
            <div class="perfil-imagem">
              <img src="imagens/criador2.jpg" alt="" width="400px" height="400px">
            </div>

            <div class="perfil-text">
              <p>Olá! Eu sou Nicolas de Lima Pinheiro, um dos criadores e integrante do grupo EcoCloset. Tenho 17 anos e estou cursando o 2TID na escola Alcina Dantas Feijão.
                <br>
                <p2>#JUST DO IT</p2>
              </p>
              <h3>Nicolas</h3>
              <p>EcoCloset</p>
            </div>
          </div>

          <div class="slide-col">
            <div class="perfil-imagem">
              <img src="imagens/criador3.jpg" alt="" width="400px" height="400px">
            </div>

            <div class="perfil-text">
              <p>Olá! Eu sou Raphael de França Quirino, um dos criadores e integrante do grupo EcoCloset. Tenho 18 anos e estou cursando o 2TID na escola Alcina Dantas Feijão.
                <br>
                <p2>#DO YOUR BEST</p2>
              </p>
              <h3>Raphael</h3>
              <p>EcoCloset</p>
            </div>
          </div>



        </div>

      </div>
    </div>
  </div>

  <script>
    var btn = document.getElementsByClassName("btn-perfil");
    var slide = document.getElementById("slide");



    btn[0].onclick = function() {
      slide.style.transform = "translateX(0px)";
      for (i = 0; i < 3; i++) {
        btn[i].classList.remove("active-perfil");
      }
      this.classList.add("active-perfil");
    }


    btn[1].onclick = function() {
      slide.style.transform = "translateX(-800px)";
      for (i = 0; i < 3; i++) {
        btn[i].classList.remove("active-perfil");
      }
      this.classList.add("active-perfil");
    }


    btn[2].onclick = function() {
      slide.style.transform = "translateX(-1605px)"; //Eu coloquei um valor desigual porque não estava ficando completamente no centro//
      for (i = 0; i < 3; i++) {
        btn[i].classList.remove("active-perfil");
      }
      this.classList.add("active-perfil");
    }
  </script>
  <!-- Fim da construção do "Carrossel de criadores" -->

  <?php

  include("includes/footer.php")

  ?>

</body>
