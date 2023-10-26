<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <title>compra finalizada</title>
</head>
<body>
<<<<<<< HEAD
=======
<<<<<<<< HEAD:compra-finalizada.html
>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a
    

  <?php

  include("menu.php");

<<<<<<< HEAD
=======
========
  
  <?php
  include('menu.php');
>>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a:compra-finalizada.php
>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a
  ?>



<<<<<<< HEAD
=======
<<<<<<<< HEAD:compra-finalizada.html
========


>>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a:compra-finalizada.php
>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a
   <div class="conteudo-compra-finalizada">


    <div class="ecocloset-compra-finalizada">

        <div class="imagem-compra-finalizada">
            <img src="imagens/logoroxamenor.png" alt="Image" height="70" width="70">
        </div>

<<<<<<< HEAD
        <div class="ecoclosetm-compra-finalizada">
=======
<<<<<<<< HEAD:compra-finalizada.html
        <div class="ecoclosetm-compra-finalizada">
========
        <div class="menssagem-compra-finalizada">
>>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a:compra-finalizada.php
>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a
            <p>EcoCloset</p>
        </div>
            
    </div>

    <div class="agradecimento-compra-finalizada">
        <p>Obrigado Arthur, por comprar conosco!</p>
    </div>

    <div class="mensagem-compra-finalizada">
        <p>Confira as proximas atualizações de seu pedido por seu email.</p>
    </div>

    <div class="gif-compra-finalizada">

        <div class="order">
                   
        <div class="box"></div>
        <div class="truck">
            <div class="back"></div>
            <div class="front">
                <div class="window"></div>
            </div>
            <div class="light top"></div>
            <div class="light bottom"></div>
        </div>
        <div class="lines"></div>

    </div>
    

    </div>


   </div>
   


   <?php

  include("includes/footer.php")

  ?>




<<<<<<< HEAD
=======






   <?php
   include('includes/footer.php');
   ?>

>>>>>>> 1004e3d15062726489a3672e5a5141d4c610042a
</body>
</html>

<script>

const order = document.querySelector(".order");
const animationDuration = 8400; // Duração da animação em milissegundos
const intervalBetweenAnimations = 200; // Intervalo entre animações em milissegundos

function handleOrderAnimation() {
  if (!order.classList.contains("animate")) {
    order.classList.add("animate");
    setTimeout(function() {
      order.classList.remove("animate");
      // Adicione este trecho para reiniciar a animação após um intervalo específico
      setTimeout(function() {
        handleOrderAnimation();
      }, intervalBetweenAnimations);
    }, animationDuration);
  }
}

function init() {
  // Chame handleOrderAnimation diretamente ao iniciar a página
  handleOrderAnimation();
}

init();


</script>