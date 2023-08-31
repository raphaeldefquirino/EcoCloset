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
    <title>EcoCloset</title>
</head>
<body>

<?php 
   
   include("includes/menu.php");

  ?>

  <?php 

    include("includes/conexao.php");

    $consulta = "SELECT * FROM cadastro_prod WHERE categoria = 'Feminina'";
    $resultado = mysqli_query($conexao, $consulta);
   
    if(mysqli_num_rows($resultado) > 0){
      echo  '<div class="catigoria">';
      while( $produto = mysqli_fetch_assoc($resultado)){

       echo '<div class="product">';
       echo '<h3>' .  $produto['nome_prod'] . '</h3>';
       echo '<br><br>';
       echo '<a href="">';
       echo '<img class="imgprod" src="' . $produto['path'] . '" alt="Camiseta">';
       echo '</a>';
       echo '<br>';
       echo '<br><br>';
       echo '<p class="descrição">' . $produto['descricao_prod'] . '</p>';    
       echo '<p class="preço"> R$' . $produto['valor'] . '</p>';
       echo '<br><br><br>';
       echo '<a target = "_blank" href="https://wa.me/' . $produto['telefone'] . '">';
       echo  '<p> &#128222 ' . $produto['telefone'] . '</p>';
       echo  '</a>';
       echo '</div>';
      
      }
      echo  '</div>'; 
    }

    

     else {

      echo '<p>Nenhum produto encontrado.</p>';
   }


 mysqli_close($conexao);
 ?>
  
  

  <?php 
   
   include("includes/footer.php");

  ?>
</body>
</html>
