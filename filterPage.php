<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <title>EcoCloset</title>
</head>

<body class="bodyprod">

    <?php
    //adiciona o arquivo do menu
    include("menu.php");

    ?>

    <div class="filter-bar">
        <button class="filter-button mobile-show">Mostrar filtros</button>
        <form action="filterPage.php" method="post">
            <label for="subcategory" class="subcategory">Subcategoria:</label>
            <select name="subcategoria" id="subcategory">

                <option value="Acessório">Acessório</option>
                <option value="Biquíni">Bíquini</option>
                <option value="Blazer">Blazer</option>
                <option value="Blusa">Blusa</option>
                <option value="Calça">Calça</option>
                <option value="Calçado">Calçado</option>
                <option value="Camisa">Camisa</option>
                <option value="Cinto">Cinto</option>
                <option value="Conjunto">Conjunto</option>
                <option value="Cropped">Cropped</option>
                <option value="Legging">Legging</option>
                <option value="Macacão">Macacão</option>
                <option value="Pijama">Pijama</option>
                <option value="Saia">Saia</option>
                <option value="Shorts">Shorts</option>
                <option value="Sueter">Suéter</option>
                <option value="Terno">Terno</option>
                <option value="Vestido">Vestido</option>

            </select>

            <label for="sort" class="subcategory">Classificar por:</label>
            <select name="sort" id="sort">
                <option value="caro">Menor preço</option>
                <option value="barato">Maior preço</option>
            </select>

            <button class="filter-button" name="filtrar" value="Masculina"> Filtrar</button>
        </form>
    </div>
    <?php
    //adiciona o arquivo de conexão com o banco de dados
    include("includes/conexao.php");

    //está variável é que vai me dizer em qual página o usuário está, Feminia, Masculina ou Kids
    $page = mysqli_real_escape_string($conexao, trim($_POST['filtrar']));

    //obtem a opção do filtro escolhido pelo usuário 
    $subcategoria = mysqli_real_escape_string($conexao, trim($_POST['subcategoria']));
    $preco = mysqli_real_escape_string($conexao, trim($_POST['sort']));

    //consulta SQL na tebela de produtos cadastrados para encontrar os produtos do filtro que o usuário escolheu (VAI ORDENAR OS PRODUTOS MAIS CAROS PRIMEIRO)
    $consultaCaro = "SELECT * FROM cadastro_prod WHERE categoria = '$page' AND subcategoria = '$subcategoria' ORDER BY valor ASC";
    $resultadoCaro = mysqli_query($conexao, $consultaCaro);

    //consulta SQL na tabela de produtos cadastrados para encontrar os produtos que o usuário escolheu (VAI ORDENAR OS PRODUTOS MAIS BARATOS PRIMEIRO)
    $consultaBarato = "SELECT * FROM cadastro_prod WHERE categoria = '$page' AND subcategoria = '$subcategoria' ORDER BY valor DESC";
    $resultadoBarato = mysqli_query($conexao, $consultaBarato);


    //Condição para os produtos caros
    if ($preco == 'caro') {
        //condição para caso a consutla retornar algum valor 
        if (mysqli_num_rows($resultadoCaro) > 0) {
            echo  ' <div class="container">';
            //loop para percorrer todos os produtos encontrados no banco de dados e exibir para o usuário
            while ($produto = mysqli_fetch_assoc($resultadoCaro)) {

                echo '<a href="paginaprod.php?id=' . $produto['idproduto'] . '"><div class="clothing-item">';
                echo '<img src="' . $produto['path'] . '" alt="Calça jeans">';
                echo '<br>';
                echo '<br>';
                echo '<div class="btncarrinho"><a href="adicionaCarrinho.php?idproduto=' . $produto['idproduto'] . '"><span class="material-symbols-outlined" id="prod-neckklace">add_shopping_cart</span></a></div>';
                echo '<div class="clothing-details">';
                echo '<h3 class="h3produtos">' . $produto['nome_prod'] . '</h3>';
                echo ' <p class="clothing-price"><strong>R$' . $produto['valor'] . ' </strong></p>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        }
        echo  '</div>';
        //condição para os produtos baratos
    } else if ($preco == 'barato') {
        //condição para caso a consutla retornar algum valor 
        if (mysqli_num_rows($resultadoBarato) > 0) {
            echo  ' <div class="container">';
            //loop para percorrer todos os produtos encotrados no banco de dados e exibir para o usuário
            while ($produto = mysqli_fetch_assoc($resultadoBarato)) {

                echo '<a href="paginaprod.php?id=' . $produto['idproduto'] . '"><div class="clothing-item">';
                echo '<img src="' . $produto['path'] . '" alt="Calça jeans">';
                echo '<br>';
                echo '<br>';
                echo '<div class="btncarrinho"><a href="adicionaCarrinho.php?idproduto=' . $produto['idproduto'] . '"><span class="material-symbols-outlined" id="prod-neckklace">add_shopping_cart</span></a></div>';
                echo '<div class="clothing-details">';
                echo '<h3 class="h3produtos">' . $produto['nome_prod'] . '</h3>';
                echo ' <p class="clothing-price"><strong>R$' . $produto['valor'] . ' </strong></p>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        }
        echo  '</div>';
    }
    //condição para caso a consulta não encontre nenhum dos dois resultados, e exibe uma mensagem para o usuário 
    if (mysqli_num_rows($resultadoBarato) == 0 &&  mysqli_num_rows($resultadoCaro) == 0) {
        echo '<div class = "product-found">Ops, não encontramos o produto especificado. </div>.';
    }

    //encerra a conexão com o banco de dados
    mysqli_close($conexao);
    ?>



    <?php
    //inclui o arquivo do rodapé 
    include("includes/footer.php");

    ?>

    <script>
        $(document).ready(function() {
            $('.filter-bar .mobile-show').on('click', function() {
                $('.filter-bar form').slideToggle();
            });

            // Listener para o evento de redimensionamento da janela
            $(window).resize(function() {
                if ($(window).width() > 767) {
                    $('.filter-bar form').css('display', 'block'); // Mostra o formulário
                }
            });
        });
    </script>
</body>

</html>