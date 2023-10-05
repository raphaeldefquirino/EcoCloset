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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
  <title>EcoCloset</title>
</head>

<body class="bodyprod">

  <?php

  include("menu.php");

  ?>

  <div class="filter-section">
    <label for="subcategory">Subcategoria:</label>
    <select name="subcategory" id="subcategory">
      <option value="">Escolha</option>
      <option value="shorts">Shorts</option>
      <option value="jacket">Jaqueta</option>
      <option value="shoes">Tênis</option>
      <option value="sweatpants">Calça moletom</option>
    </select>

    <label for="sort">Classificar por:</label>
    <select name="sort" id="sort">
      <option value="lowest">Menor preço</option>
      <option value="highest">Maior preço</option>
    </select>

    <button class="filter-button">Filtrar</button>
  </div>

  <?php

  include("includes/conexao.php");

  $consulta = "SELECT * FROM cadastro_prod WHERE categoria = 'Kids'";
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
    }
    echo  '</div>';
  } else {

    echo '<p>Nenhum produto encontrado.</p>';
  }


  mysqli_close($conexao);
  ?>



  <?php

  include("includes/footer.php");

  ?>
</body>

</html>