<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Roupas Cadastradas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        h1 {
            margin: 0;
        }

        h3 {
            font-size: 17px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1300px;
            margin: 20px auto;
            padding: 30px;
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .clothing-item {
            width: 200px;
            margin: 8px;
            background-color: #ffffff;
            border-radius: 10px;
            text-align: center;
            padding: 15px;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .clothing-item img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: transform 0.3s ease;
        }

        .clothing-item:hover img {
            transform: scale(1.1);
        }

        .material-symbols-outlined {
            background-color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 24px;
            position: absolute;
            top: 175px; /* Posição em relação ao topo */
            right: 20px; /* Posição em relação à direita */
            cursor: pointer;
             transition: transform 0.3s ease;
        }

        .clothing-details {
            text-align: left;
            align-items: left;
            font-size: 12px;
            margin-top: -7px;
        }

        .clothing-price {
            font-weight: bolder;
            font-size: 14px;
            color: rgb(175, 78, 175);
        }

        @media screen and (max-width: 768px) {
            .clothing-item {
                flex: 0 0 calc(50% - 20px);
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 480px) {
            .clothing-item {
                flex: 0 0 100%;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Roupas Cadastradas</h1>
    </header>
    <div class="container">
        <a href="pagprod.html">
            <div class="clothing-item">
            <img src="img/calça jenas.jpg" alt="Calça jeans">
           <a href="cadastro.php"><span class="material-symbols-outlined">add_shopping_cart</span></a>
            <div class="clothing-details">
                <h3>Calça jeans básica</h3>
                <p class="clothing-price"><strong>R$ 50,00</strong></p>
            </div>
        </div>
    </a>
    
    
    


        <!-- Outros itens de roupa -->
    </div>
</body>

</html>
