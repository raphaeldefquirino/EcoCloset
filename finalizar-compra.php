<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o banco de dados
include('includes/conexao.php');
//arquivo para verificar se o usuário está logado, serve para impedir que usuários não logados acessem a página
include('includes/verifica-login.php');

//variável para armazenar o id do usuário que será passado via URL da página 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//comando SQL para consultar a tabela de produtos cadastrados com base no id do usuário 
$sql = "SELECT * FROM cadastro_prod WHERE idproduto = '$id'";
$query = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($query);

$id_usuario = $_SESSION['id_usuario'];

//comando SQL para consultar a tabela de endereços cadastrados com base no id do usuário para que o usuário possa selecionar o endereço de entrega, sessão do cartão de crédito
$consultaEnd = "SELECT * FROM enderecos WHERE idusuario = '$id_usuario'";
$resultadoEnd = mysqli_query($conexao, $consultaEnd);

//comando SQL para consultar a tabela de endereços cadastrados com base no id do usuário para que o usuário possa selecionar o endereço de entrega, sessão do pix
$consultaEnd1 = "SELECT * FROM enderecos WHERE idusuario = '$id_usuario'";
$resultadoEnd1 = mysqli_query($conexao, $consultaEnd1);

//comando SQL para consultar a tabela de endereços cadastrados com base no id do usuário para que o usuário possa selecionar o endereço de entrega, sessão do boleto
$consultaEnd2 = "SELECT * FROM enderecos WHERE idusuario = '$id_usuario'";
$resultadoEnd2 = mysqli_query($conexao, $consultaEnd2);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>

<body>


    <?php

    include("menu.php");

    ?>
    <!--
    Layout da página de pagamento e finalização de compra.
    A seção "payment-methods" contém opções de pagamento (cartão, PIX, boleto) com botões de rádio.
    A seção "tabela-carrinho-pag-cad" exibe detalhes do produto selecionado para compra.
    As seções "pix-container", "boleto-container" e "card-container" são alternadas dependendo do método de pagamento escolhido.
    O formulário de finalização de compra é exibido para o método de pagamento com cartão.
    A função JavaScript verifica e formata os campos do cartão em tempo real.
    Ao selecionar o método de pagamento PIX, um botão de cópia da chave PIX é exibido.
    -->

    <div class="container-pag-cad">



        <div class="payment-methods">
            <label>
                <span>
                    <input type="radio" name="paymentMethod" value="card" checked>
                    Cartão
                </span>
            </label>
            <label>
                <span>
                    <input type="radio" name="paymentMethod" value="pix">
                    Pix
                </span>
            </label>
            <label>
                <span>
                    <input type="radio" name="paymentMethod" value="boleto">
                    Boleto
                </span>
            </label>
        </div>

        <div class="tabela-carrinho-pag-cad">

            <div class="imagem-tabela-carrinho-pag-cad">
                <?php echo '<img src="' . $row['path'] . '" alt="" height="110px" width="100px">' ?>
            </div>

            <div class="texto-tabela-carrinho-pag-cad">
                <div class="preco-tabela-carrinho-pag-cad">
                    <p>R$ <?php echo $row['valor'] ?></p>
                </div>
                <div class="desc-tabela-carrinho-pag-cad">
                    <p><?php echo $row['nome_prod'] ?></p>
                </div>
            </div>



        </div>

        <br><br>


        <div class="flexbox">
            <div class="pix-container">

                <div class="qrcode-container">
                    <img src="imagens/qrcode.png" alt="QR Code PIX" class="pix-qrcode">
                    <br>


                    <div class="pix-copy-btn">
                        <button data-pix-key="Chave do pixxx"><span class="material-symbols-outlined">
                                content_copy </span>Pix copia e cola</button>

                    </div>

                </div>
                <div class="form-pix-">

                    <div class="inputBox">
                        <span>Endereço de Entrega</span>
                        <select name="" id="" class="month-input">
                            <option value="month" selected disabled>Endereço de Entrega</option>
                            <?php
                            //loop para percorrer todos os endereços do usuário e exibi-los na página
                            while ($end = mysqli_fetch_assoc($resultadoEnd)) : ?>
                                <option value="01"><?= $end['nome_end'] ?></option>
                            <?php
                            //fim do loop
                            endwhile; ?>

                        </select>
                    </div>
                    <div id="textfield-finalizar-prod" class="textfield">
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

                    <button class="pix-finalizar"><a href="compra-finalizada.php" style="text-decoration: none; color: rgb(175, 0, 255);">Finalizar Compra</a></button>

                </div>
            </div>

            <!-- Formulário Boleto -->
            <div class="flexbox">
                <div class="boleto-container">
                    <img src="imagens/boleto.png" alt="">
                    <br>
                    <br>
                    <br>
                    <div class="inputBox">
                        <span>Endereço de Entrega</span>
                        <select name="" id="" class="month-input">
                            <option value="month" selected disabled>Endereço de Entrega</option>
                            <?php
                            //loop para percorrer todos os endereços do usuário e exibi-los na página
                            while ($end2 = mysqli_fetch_assoc($resultadoEnd2)) : ?>
                                <option value="01"><?= $end2['nome_end'] ?></option>
                            <?php
                            //fim do loop
                            endwhile; ?>
                        </select>
                        <br><br>
                    </div>
                    <p>Seu boleto será gerado e enviado por email após a finalização da compra.</p>
                    <br>
                    <p>Todas as informações da sua compra serão enviadas para o seu email cadastrado</p>
                    <br>
                    <div id="textfield-finalizar-prod" class="textfield">
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
                    <button class="pix-finalizar"><a href="compra-finalizada.php" style="text-decoration: none; color: rgb(175, 0, 255);"> Finalizar Compra </a></button>


                </div>
            </div>

            <div class="card-container">

                <div class="front">
                    <div class="image">
                        <img src="imagens/chip.png" alt="">
                        <img src="imagens/visa.png" alt="">
                    </div>

                    <div class="card-number-box"></div>
                    <div class="flexbox">
                        <div class="box">
                            <span>Número do Cartão</span>
                            <div class="card-holder-name">Nome do Cartão</div>
                        </div>
                        <div class="box">
                            <span>expira</span>
                            <div class="expiration">
                                <span class="exp-month">mm</span>
                                <span class="exp-year">aa</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"></div>
                        <img src="imagens/visa.png" alt="">
                    </div>
                </div>

            </div>

            <form action="compra-finalizada.php" method="post" enctype="multipart/form-data" id="form">
                <div class="total-pag-finalizar">

                    <p class="TotalFinalizar">TOTAL : R$<?php echo $row['valor'] ?></p>
                </div>
                <div class="inputBox">
                    <span>Número do Cartão</span>
                    <input type="text" maxlength="16" class="card-number-input" placeholder="Número do Cartão" id="numeroCartao">
                </div>
                <div class="inputBox">
                    <span>Nome do Titular</span>
                    <input type="text" class="card-holder-input" placeholder="Nome do Titular">
                </div>
                <div class="flexbox">
                    <div class="inputBox">
                        <span>Validade mm</span>
                        <select name="" id="" class="month-input">
                            <option value="month" selected disabled>Mês</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Ano</span>
                        <select name="" id="" class="year-input">
                            <option value="year" selected disabled>Ano</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>


                    <div class="inputBox">
                        <span>cvv</span>
                        <input type="text" maxlength="4" class="cvv-input" placeholder="cvv">
                    </div>
                </div>
                <div class="inputBox">
                    <span>Endereço de Entrega</span>
                    <select name="" id="" class="month-input">
                        <option value="month" selected disabled>Endereço de Entrega</option>
                        <?php
                        //loop para percorrer todos os endereços do usuário e exibi-los na página
                        while ($end1 = mysqli_fetch_assoc($resultadoEnd1)) : ?>
                            <option value="01"><?= $end1['nome_end'] ?></option>
                        <?php
                        //fim do loop
                        endwhile; ?>

                    </select>
                </div>


                <div class="inputBox">
                    <div class="Parcelas">
                        <span>Parcelas</span>
                        <select name="subcategoria" id="">
                            <option value="1x">1x de R$<?php echo $row['valor'] ?></option>

                            <p>
                                <option value="2x">2x de R$
                                    <?php
                                    $valor = $row['valor'] / 2;
                                    echo number_format($valor, 2, ',', '.');
                                    ?>
                                </option>
                            </p>
                            <p>
                                <option value="3x">3x de R$<?php
                                                            $valor = $row['valor'] / 3;
                                                            echo number_format($valor, 2, ',', '.');
                                                            ?></option>
                            </p>
                            <p>
                                <option value="4x">4x de R$<?php
                                                            $valor = $row['valor'] / 4;
                                                            echo number_format($valor, 2, ',', '.');
                                                            ?></option>
                            </p>
                            <p>
                                <option value="5x">5x de R$<?php
                                                            $valor = $row['valor'] / 5;
                                                            echo number_format($valor, 2, ',', '.');
                                                            ?></option>
                            </p>
                            <p>
                                <option value="6x">6x de R$<?php
                                                            $valor = $row['valor'] / 6;
                                                            echo number_format($valor, 2, ',', '.');
                                                            ?></option>
                            </p>
                            <p>
                                <option value="7x">7x de R$<?php
                                                            $valor = $row['valor'] / 7;
                                                            echo number_format($valor, 2, ',', '.');
                                                            ?></option>
                            </p>
                            <p>
                                <option value="8x">8x de R$<?php
                                                            $valor = $row['valor'] / 8;
                                                            echo number_format($valor, 2, ',', '.');
                                                            ?></option>
                            </p>
                        </select>
                    </div>
                </div>
                <div id="textfield-finalizar-prod" class="textfield">
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
                <input type="submit" value="Finalizar compra" class="submit-btn">

            </form>

        </div>
    </div>
<!--
    Funções JavaScript para validação e formatação dinâmica de campos no formulário de pagamento.
    1. O trecho verifica se o número do cartão tem 16 dígitos numéricos ao enviar o formulário, exibindo um alerta em caso de erro.
    2. As funções a seguir atualizam dinamicamente a exibição dos dados do cartão enquanto o usuário digita.
    3. A transformação do cartão ao focar e desfocar o campo CVV é realizada para simular o efeito de virar o cartão.
    4. O evento de troca de método de pagamento controla a visibilidade dos formulários de acordo com a escolha (cartão, PIX, boleto).
    5. A função copia a chave PIX para a área de transferência quando o usuário clica no botão correspondente.
-->
    <script>
        $(document).ready(function() {

            $('#form').submit(function(event) {
                var numeroCartao = $('#numeroCartao').val();
                var numeroCartaoSemEspacos = numeroCartao.replace(/\s/g, ''); // Remove espaços em branco
                if (!(/^\d{16}$/.test(numeroCartaoSemEspacos))) {
                    alert("O número do cartão deve ter 16 dígitos numéricos.");
                    event.preventDefault(); // Impede o envio do formulário
                }
            });

        });
    </script>

    <script>
        document.querySelector('.card-number-input').oninput = () => {
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
        }

        document.querySelector('.card-holder-input').oninput = () => {
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
        }

        document.querySelector('.month-input').oninput = () => {
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
        }

        document.querySelector('.year-input').oninput = () => {
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        }

        document.querySelector('.cvv-input').addEventListener('focus', () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        });

        document.querySelector('.cvv-input').addEventListener('blur', () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        });


        document.querySelector('.cvv-input').oninput = () => {
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
        }

        document.querySelectorAll('input[name="paymentMethod"]').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelector('.container-pag-cad form').style.display = this.value === 'card' ? 'block' : 'none';
                document.querySelector('.card-container').style.display = this.value === 'card' ? 'block' : 'none';
                document.querySelector('.pix-container').style.display = this.value === 'pix' ? 'block' : 'none';
                document.querySelector('.boleto-container').style.display = this.value === 'boleto' ? 'block' : 'none';
            });
        });

        document.querySelector('.pix-copy-btn').addEventListener('click', function() {
            const pixKey = this.getAttribute('data-pix-key');
            const textarea = document.createElement('textarea');
            textarea.value = pixKey;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('Chave PIX copiada com sucesso!');
        });
    </script>





    <?php

    include("includes/footer.php")

    ?>

</body>

</html>