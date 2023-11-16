<?php
session_start();
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
    <title>Cadastro</title>
</head>

<body class="cad">

    <?php

    include_once('menu.php');

    ?>

    <div class="main-login">
        <div class="left-login">
            <h1>Entre para nossa turma</h1>

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

                            <p>Cadastrado com sucesso!</p>

                        </div>
                    </div>


                <?php
                endif;
                unset($_SESSION['status_cadastro']);
                ?>

                <form action="includes/cadastrar.php" method="post">


                    <div class="textfield">
                        <br>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Senha" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="confirma-senha">Confirmar senha</label>
                        <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirmar senha" required>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required>
                    </div>

                    <div class="textfield">
                        <br>
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
                    </div>

                    <div class="textfield">
                        <br>

                        <div class="categoria">
                             <br>
                            <div class="checks">
                                <input type="checkbox" name="termo" value="checked" id="catinf">
                                <label for="Inferior">Declaro que li e concordo integralmente com <a href="imagens/termos-ecocloset.pdf" target="_blank">Termo de Uso</a></label>
                                <br>
                            </div>
                            <br>
                        </div>
                    </div>


                    <button class="btn-login">Cadastrar</button>
            </div>
        </div>


    </div>

    </form>

    <?php

    include_once('includes/footer.php');

    ?>

</body>

</html>

</body>

</html>