<?php
session_start();

include('includes/conexao.php');

$id_usuario = $_SESSION['id_usuario'];

$consultaDados = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
$resultadoDados = mysqli_query($conexao, $consultaDados);
$dados = mysqli_fetch_assoc($resultadoDados);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilos/style.css">
  <link rel="stylesheet" href="estilos/media-query.css">
    <script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

    <title>Cadastro</title>
</head>

<body class="cad">

    <?php

    include_once('menu.php');

    ?>

    <div class="main-login">
        <div class="left-login">

            <img src="imagens/address-animate.svg" class="img-cad" alt="">

        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Adicionar endereço</h1>

                <?php

                if (isset($_SESSION['status_endereco'])) :

                ?>

                    <div class="caixa-CadastroCerto">
                        <div class="menssagemCerto">

                            <p>Endereço cadastrado com sucesso!</p>

                        </div>
                    </div>


                <?php
                endif;
                unset($_SESSION['status_endereco']);
                ?>

                <form action="includes/adicionaEnderecoBanco.php" method="post">


                    <div class="textfield">
                        <br>
                        <label for="nome">Nome do endereço</label>
                        <input type="text" name="nome" id="nome" placeholder="Dê um título para o seu endereço." required> 
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="Digite o cep do seu endereço" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Digite a sua cidade" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Digite o seu bairro" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" id="rua" placeholder="Digite a sua rua" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="numero">Número</label>
                        <input type="text" name="numero" id="numero" placeholder="Digite o número do seu endereço" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="complemento" placeholder="Digite o número do seu complemento" required>
                    </div>
                    <button class="btn-login">Editar</button>
            </div>
        </div>


    </div>

    </form>

    <?php

    include_once('includes/footer.php');

    ?>

<script>
 $(document).ready(function () {
      $('#cep').mask('00000-000');
    });
</script>

</body>

</html>

</body>

</html>