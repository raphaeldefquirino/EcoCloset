<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o banco de dados
include('includes/conexao.php');

//arquivo para verificar se o usuário está logado, serve para impedir que usuários não logados acessem a página
include('includes/verifica-login.php');

//armazena o id do usuário
$id_usuario = $_SESSION['id_usuario'];

//consulta SQL que serve para puxar os dados do usuário com base no id dele
$consultaDados = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
$resultadoDados = mysqli_query($conexao, $consultaDados);
$dados = mysqli_fetch_assoc($resultadoDados);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Declaração do tipo de documento HTML e definição do idioma -->
    <!DOCTYPE html>
    <html lang="pt-br">

    <!-- Configuração do cabeçalho da página -->
    <head>
        <!-- Codificação de caracteres UTF-8 para suportar caracteres especiais -->
        <meta charset="UTF-8">

        <!-- Configuração da viewport para controle do layout responsivo -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Links para folhas de estilo externas -->
        <link rel="stylesheet" href="usuario.css">
        <link rel="stylesheet" href="estilos/style-user.css">
        <link rel="stylesheet" href="estilos/style.css">
        <link rel="stylesheet" href="estilos/media-query.css">

        <!-- Link para a fonte "Material Symbols Outlined" do Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <!-- Título da página exibido na aba/navegador -->
        <title>Página de usuário</title>
    </head>

    <!-- Corpo da página HTML -->
    <body>

    <?php

    // Inclusão do arquivo PHP para o menu
    include("menu.php");

    ?>

    <!-- Conteúdo principal da página de compra finalizada -->
    <div class="body-compra-finalizada">

        <!-- Tela de carregamento -->
        <div class="tela-carregamento">

            <!-- Elemento de carregamento animado -->
            <div class="loading">

                <span></span>
                <span></span>
                <span></span>

            </div>
            <!-- Fim Elemento de carregamento animado -->

        </div>
        <!-- Fim Tela de carregamento -->

        <!-- Conteúdo específico da compra finalizada -->
        <div class="conteudo-compra-finalizada">

            <!-- EcoCloset - Imagem e texto -->
            <div class="ecocloset-compra-finalizada">

                <!-- Logotipo do EcoCloset -->
                <div class="imagem-compra-finalizada">

                    <img src="imagens/logoroxamenor.png" alt="Image" height="70" width="70">

                </div>
                <!-- Fim Logotipo do EcoCloset -->

                <!-- Texto "EcoCloset" -->
                <div class="ecoclosetm-compra-finalizada">

                    <p>EcoCloset</p>

                </div>
                <!-- Fim Texto "EcoCloset" -->

            </div>
            <!-- Fim EcoCloset - Imagem e texto -->

            <!-- Agradecimento personalizado usando dados do usuário -->
            <div class="agradecimento-compra-finalizada">

                <p>Obrigado <?php echo $dados['nome'] ?>, por comprar conosco!</p>

            </div>
            <!-- Fim Agradecimento personalizado usando dados do usuário -->

            <!-- Mensagem informativa sobre atualizações por e-mail -->
            <div class="mensagem-compra-finalizada">

                <p>Confira as próximas atualizações de seu pedido por seu e-mail.</p>

            </div>
            <!-- Fim Mensagem informativa sobre atualizações por e-mail -->

            <!-- Animação GIF representando o processo de pedido -->
            <div class="gif-compra-finalizada">

                <!-- Elemento de animação com caixa, caminhão e linhas -->
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
                <!-- Fim Elemento de animação com caixa, caminhão e linhas -->

            </div>
            <!-- Fim Animação GIF representando o processo de pedido -->

        </div>
        <!-- Fim Conteúdo específico da compra finalizada -->
        
    </div>
    <!-- Fim Conteúdo principal da página de compra finalizada -->

    <?php

    // Inclusão do arquivo PHP para o rodapé
    include("includes/footer.php")

    ?>

</body>
<!-- Fim Corpo da página HTML -->

</html>

<script>
    // Seleciona o elemento com a classe "order"
    const order = document.querySelector(".order");

    // Duração da animação em milissegundos
    const animationDuration = 8400;

    // Intervalo entre animações em milissegundos
    const intervalBetweenAnimations = 200;

    // Função para manipular a animação do pedido
    function handleOrderAnimation() {
        // Verifica se a classe "animate" não está presente no elemento
        if (!order.classList.contains("animate")) {
            // Adiciona a classe "animate" para iniciar a animação
            order.classList.add("animate");

            // Define um tempo limite para remover a classe "animate" após a duração da animação
            setTimeout(function() {
                order.classList.remove("animate");

                // Adiciona este trecho para reiniciar a animação após um intervalo específico
                setTimeout(function() {
                    handleOrderAnimation();
                }, intervalBetweenAnimations);
            }, animationDuration);
        }
    }

    // Função de inicialização
    function init() {
        // Chama handleOrderAnimation diretamente ao iniciar a página
        handleOrderAnimation();
    }

    // Inicializa a animação
    init();

    // Evento que escuta o carregamento do DOM
    document.addEventListener("DOMContentLoaded", function() {
        // Seleciona o elemento com a classe "tela-carregamento"
        const telaCarregamento = document.querySelector('.tela-carregamento');

        // Define um tempo limite para ocultar a tela de carregamento após 7 segundos
        setTimeout(function() {
            telaCarregamento.style.display = 'none';
        }, 7000);
    });

    // Evento que escuta o carregamento do DOM
    document.addEventListener("DOMContentLoaded", function() {
        // Define um tempo limite para exibir o conteúdo de compra finalizada após 6.5 segundos
        setTimeout(function() {
            // Seleciona o elemento com a classe "conteudo-compra-finalizada"
            const conteudoCompraFinalizada = document.querySelector('.conteudo-compra-finalizada');
            conteudoCompraFinalizada.style.display = 'block';
        }, 6500);
    });
</script>
