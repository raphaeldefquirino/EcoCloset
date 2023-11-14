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
    <title>Cadastro</title>
</head>

<body class="cad">

    <?php

    include_once('menu.php');

    ?>

    <div class="main-login">
        <div class="left-login">

            <img src="imagens/shopping-animate.svg" class="img-cad" alt="">

        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Cadastro</h1>

                <?php

                if (isset($_SESSION['usuario_existe'])) :

                ?>


                    <div class="caixa-CadastroErro">
                        <div class="menssagemErro">

                            <p>ATENÇÃO!! <br>
                                Houve um erro ao cadastrar-se. <br>
                                O email informado já foi inserido. </p>

                        </div>
                    </div>

                <?php
                endif;
                unset($_SESSION['usuario_existe']);
                ?>

                <?php

                if (isset($_SESSION['senhas_divergem'])) :

                ?>


                    <div class="caixa-CadastroErro">
                        <div class="menssagemErro">

                            <p>ATENÇÃO!! <br>
                                Houve um erro ao cadastrar-se. <br>
                                As senhas não coincidem, verifique e tente novamente. </p>

                        </div>
                    </div>

                <?php
                endif;
                unset($_SESSION['senhas_divergem']);
                ?>


                <?php

                if (isset($_SESSION['status_cadastro'])) :

                ?>

                    <div class="caixa-CadastroCerto">
                        <div class="menssagemCerto">

                            <p>Seus Dados foram editados com sucesso com sucesso!</p>

                        </div>
                    </div>


                <?php
                endif;
                unset($_SESSION['status_cadastro']);
                ?>

                <form action="includes/editaDadosBanco.php" method="post" id="form">


                    <div class="textfield">
                        <br>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email" required value="<?= $dados['email'] ?>">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required value="<?= $dados['nome'] ?>">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required value="<?= $dados['sobrenome'] ?>">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Telefone" required value="<?= $dados['telefone'] ?>">
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
      // Adiciona validação básica de formato de e-mail
      $('#email').on('input', function () {
        var email = $(this).val();
        if (/^\S+@\S+\.\S+$/.test(email)) {
          // E-mail válido
          $(this).removeClass('invalid').addClass('valid');
        } else {
          // E-mail inválido
          $(this).removeClass('valid').addClass('invalid');
        }
      });

      $('#telefone').mask('(00) 00000-0000');
    
      // Adiciona evento de submit para o formulário
      $('#form').submit(function (event) {
        var email = $('#email').val();

        if (!/^\S+@\S+\.\S+$/.test(email)) {
          // E-mail inválido
          alert("O campo e-mail deve ser no formato exigido.");
          event.preventDefault(); // Impede o envio do formulário
        }
      });
    });
  </script>

</body>

</html>

</body>

</html>