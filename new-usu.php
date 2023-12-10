<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o banco de dados
include('includes/conexao.php');

//arquivo para verificar se o usuário está logado, serve para impedir que usuários não logados acessem a página
include('includes/verifica-login.php');

//armazena o id do usuário
$id_usuario = $_SESSION['id_usuario'];

//comando SQL que vai fazer uma consulta na tabela do carrinho com base do id do usuário (versão para mobile)
$consultaCarrinho = "SELECT * FROM pedidos WHERE idusuario = '$id_usuario' AND status = 'carrinho'";
$resultadoCarrinho = mysqli_query($conexao, $consultaCarrinho);

//comando SQL que vai fazer uma consulta na tabela do cadastro de produtos para ver quais produtos o usuário já cadastrou no banco de dados (versão para mobile)  
$consultaCadProd = "SELECT * FROM cadastro_prod WHERE id_usu = '$id_usuario'";
$resultadoCadProd = mysqli_query($conexao, $consultaCadProd);
$CadProd = mysqli_fetch_assoc($resultadoCadProd);

//comando SQL que vai fazer uma consulta na tabela do cadastro de usuário para exibir o dados do usuário (versão para mobile)  
$consultaDados = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
$resultadoDados = mysqli_query($conexao, $consultaDados);
$dados = mysqli_fetch_assoc($resultadoDados);

//comando SQL que vai fazer uma consulta na tabela do cadastro de endereços para ver quais endereços o usuário já cadastrou no banco de dados (versão para mobile)  
$consultaEnd = "SELECT * FROM enderecos WHERE idusuario = '$id_usuario'";
$resultadoEnd = mysqli_query($conexao, $consultaEnd);
$end = mysqli_fetch_assoc($resultadoEnd);

//comando SQL que vai fazer uma consulta na tabela do cadastro de produtos e vai exibir todos os produtos cadastrados para o usuário administrador (versão para mobile)  
$consultaCadProdAdm = "SELECT * FROM cadastro_prod";
$resultadoCadProdAdm = mysqli_query($conexao, $consultaCadProdAdm);
$CadProdAdm = mysqli_fetch_assoc($resultadoCadProdAdm);

/*-------------------------------DESK----------------------*/
//comando SQL que vai fazer uma consulta na tabela do carrinho com base do id do usuário (versão para desktop)
$consultaCarrinhoDesk = "SELECT * FROM pedidos WHERE idusuario = '$id_usuario' AND status = 'carrinho'";
$resultadoCarrinhoDesk = mysqli_query($conexao, $consultaCarrinhoDesk);

//comando SQL que vai fazer uma consulta na tabela do cadastro de produtos para ver quais produtos o usuário já cadastrou no banco de dados (versão para desktop)  
$consultaCadProdDesk = "SELECT * FROM cadastro_prod WHERE id_usu = '$id_usuario'";
$resultadoCadProdDesk = mysqli_query($conexao, $consultaCadProdDesk);
$CadProdDesk = mysqli_fetch_assoc($resultadoCadProdDesk);

//comando SQL que vai fazer uma consulta na tabela do cadastro de usuário para exibir o dados do usuário (versão para desktop)  
$consultaDadosDesk = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
$resultadoDadosDesk = mysqli_query($conexao, $consultaDadosDesk);
$dadosDesk = mysqli_fetch_assoc($resultadoDadosDesk);

//comando SQL que vai fazer uma consulta na tabela do cadastro de endereços para ver quais endereços o usuário já cadastrou no banco de dados (versão para desktop)  
$consultaEndDesk = "SELECT * FROM enderecos WHERE idusuario = '$id_usuario'";
$resultadoEndDesk = mysqli_query($conexao, $consultaEndDesk);
$endDesk = mysqli_fetch_assoc($resultadoEndDesk);

//comando SQL que vai fazer uma consulta na tabela do cadastro de produtos e vai exibir todos os produtos cadastrados para o usuário administrador (versão para desktop)  
$consultaCadProdDeskAdm = "SELECT * FROM cadastro_prod";
$resultadoCadProdDeskAdm = mysqli_query($conexao, $consultaCadProdDeskAdm);
$CadProdDeskAdm = mysqli_fetch_assoc($resultadoCadProdDeskAdm);

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usuario.css">
    <link rel="stylesheet" href="estilos/style-user.css">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Página de usuário</title>
</head>

<body>
    <?php
    //inclui o arquivo de conexão com o banco de dados
    include('menu.php');
    ?>


    <!-- Início da Div com todos os conteudos da parte da foto do usuário -->
<div class="tudo-perfil-usuario">

<!-- Início da Div com todos os conteudos da parte com a foto do usuário, para modificar (display: flex;) no CSS em alguns tamanhos de telas -->
    <div class="parte-perfil-usuario">
        
        <!-- Container da foto do usuário e botão de editar -->
            <div class="container-imagem-sair-perfil-usuario">

                <!-- Imagem superfícial -->
                <div class="imagem-perfil-usuario">
                    <img src="<?= $dados['path_user'] ?>" alt="imagem de usuário" height="200px" width="200px">
                </div>
                <!-- Fim Imagem superfícial -->

                <!-- Botão para fazer o upload da imagem do perfil -->
                <div class="sobrepondo-imagem-perfil-usuario">
                    <form id="uploadForm" action="editaImagemUser.php" method="POST" enctype="multipart/form-data">
                        <input type="file" class="file-upload" name="imagemUser" id="fileInput" onchange="submitForm()">
                        <span class="material-symbols-outlined" id="edit-perfil-usuario">edit</span>
                    </form>
                </div>
                <!-- Fim Botão para fazer o upload da imagem do perfil -->

            </div>
        <!-- Fim Container da foto do usuário e botão de editar -->

        <!-- Container do testo da parte com a foto do usuário -->
        <div class="textos-perfil-usuario">

            <!-- Parte para dizer Olá e o nome do usuário -->
            <div class="ola-perfil-usuario">
                <p>Olá, <?= $dados['nome'] ?></p>
            </div>
            <!-- Fim Parte para dizer Olá e o nome do usuário -->

            <!-- Mensagem do Ecocloset -->
            <div class="mensagem-perfil-usuario">
                <p>"Seja a moda sustentável que você quer ver no mundo. Escolha o EcoCloset!"</p>
            </div>
            <!-- Fim Mensagem do Ecocloset -->

            <!-- Botão sair do usuário -->
            <div class="btn-sair-perfil-usuario">
                <a href="includes/logout.php">
                    <p>Sair</p>
                </a>
            </div>
            <!-- Fim Botão sair do usuário -->

        </div>
        <!-- Fim Container do testo da parte com a foto do usuário -->

    </div>
    <!-- Início da Div com todos os conteudos da parte com a foto do usuário, para modificar (display: flex;) no CSS em alguns tamanhos de telas -->

</div>
<!-- Fim Início da Div com todos os conteudos da parte Perfil usuário -->


<!-- Todo o conteudo da parte do card para dispositivos mobile -->
    <div class="tudo">

        <!-- Começo da parte carrinho -->
        <div class="carrinho">

            <!-- Atalho para o carrinho de compras -->
            <div class="card-carrinho" id="card-carrinho">
                <span class="material-symbols-outlined" id="shopping_cart">shopping_cart</span>
                <p>Meu carrinho de compras</p>
                <span class="material-symbols-outlined chevron" id="chevron-carrinho">chevron_right</span>
            </div>
            <!-- Fim Atalho para o carrinho de compras -->

            <!-- Todo o conteudo do atalho para o carrinho de compras -->
            <div class="conteudo-carrinho" id="conteudo-carrinho">

                <?php 
                //condição para caso a consulta do carrinho no banco retorne vazia (exibe uma mensagem de erro para o usuário)
                if (mysqli_num_rows($resultadoCarrinhoDesk) == 0) {
                    $_SESSION['carrinho-vazio'] = true;
                }
                ?>

                <?php
                //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                if (isset($_SESSION['carrinho-vazio'])) :

                ?>

                    <!-- Menssagem caso o carrinho de compras esteja vazio -->
                    <div class="carrinho-vazio">
                        <p>O seu carrinho está vazio!</p>
                    </div>
                    <!-- Fim Menssagem caso o carrinho de compras esteja vazio -->


                <?php
                //encerra a condição 'if' e encerra a variável de sessão para que a mensagem não só seja exibida assim que for chamada 
                endif;
                unset($_SESSION['carrinho-vazio']);
                ?>
                <?php 
                //loop para percorrer todas as informaçãoes retornardas do banco de dados e exibi-las para o usuário
                while ($itemCarrinho = mysqli_fetch_assoc($resultadoCarrinho)) : ?>
                    <?php
                    $idproduto = $itemCarrinho['idproduto'];
                    $consultaProduto = "SELECT * FROM cadastro_prod WHERE idproduto = '$idproduto'";
                    $resultadoProduto = mysqli_query($conexao, $consultaProduto);
                    $produto = mysqli_fetch_assoc($resultadoProduto);
                    ?>

                    <!-- Todo o conteudo da tabela carrinho de compras -->
                    <div class="conteudo-total-tabela-carrinho">

                        <!-- Tabela do carrinho de compras -->
                        <div class="tabela-carrinho">

                            <!-- Imagem do produto adicionado no carrinho de compras -->
                            <div class="imagem-tabela-carrinho">
                                <a href=""><img src="<?= $produto['path'] ?>" alt="" height="110px" width="100px"></a>
                            </div>
                            <!-- Fim Imagem do produto adicionado no carrinho de compras -->

                            <!-- Conteudo do texto do produto adicionado no carrinho de compras -->
                            <div class="texto-tabela-carrinho">

                                <!-- Preço do produto adicionado no carrinho de compras -->
                                <div class="preco-tabela-carrinho">
                                    <p>R$ <?= $produto['valor'] ?></p>
                                </div>
                                <!-- Fim Preço do produto adicionado no carrinho de compras -->

                                <!-- Descrição do produto adicionado no carrinho de compras -->
                                <div class="desc-tabela-carrinho">
                                    <p><?= $produto['nome_prod'] ?></p>
                                </div>
                                <!-- Descrição do produto adicionado no carrinho de compras -->

                            </div>
                            <!-- Fim Conteudo do texto do produto adicionado no carrinho de compras -->

                            <!-- Botão para excluir do produto adicionado no carrinho de compras -->
                            <div class="excluir-tabela-carrinho">
                                <?php
                                echo '<a href="includes/deletar.php?id= ' . $produto['idproduto'] . '"><span class="material-symbols-outlined" id="delete">delete</span></a>';
                                ?>
                            </div>
                            <!-- Botão para excluir do produto adicionado no carrinho de compras -->

                        </div>
                        <!-- Fim Todo o conteudo da tabela carrinho de compras -->

                        <!-- Botão para fechar compra do produto adicionado no carrinho de compras -->
                        <div class="confirmar-carrinho">

                            <a href="">
                                <div class="texto-confirmar-carrinho">
                                    <p>Fechar compra</p>
                                </div>
                            </a>

                        </div>
                        <!-- Botão para fechar compra do produto adicionado no carrinho de compras -->

                    </div>
                    <!-- Fim Todo o conteudo da tabela carrinho de compras -->

                <?php 
                //encerra o loop
                endwhile; ?>
                <!-- Parte do botão de fechar compra -->
                <!-- Fim parte do botão de fechar compra -->

            </div>
             <!-- Fim Todo o conteudo do atalho para o carrinho de compras -->

        </div>
        <!-- Fim da parte carrinho -->

        <!-- Começo da parte dados -->
        <div class="dados">

            <!-- Atalho para os dados -->
            <div class="card-dados" id="card-dados">
                <span class="material-symbols-outlined" id="database">database</span>
                <p>Meus dados</p>
                <span class="material-symbols-outlined chevron" id="chevron-dados">chevron_right</span>
            </div>
            <!-- Fim Atalho para o os dados -->

            <!-- Todo o conteudo dos dados -->
            <div class="conteudo-dados" id="conteudo-dados">

                <!-- Tabela dos dados -->
                <div class="tabela-dados">

                    <!-- Campo com o nome do usuário -->
                    <div class="re-nome">

                        <div class="e-nome">
                            <p>Nome: </p>
                        </div>

                        <div class="u-nome">
                            <p><?= $dados['nome'] ?> </p>
                        </div>

                    </div>
                    <!-- Fim Campo com o nome do usuário -->

                    <!-- Campo com o sobrenome do usuário -->
                    <div class="re-sobrenome">

                        <div class="e-sobrenome">
                            <p>Sobrenome: </p>
                        </div>

                        <div class="u-sobrenome">
                            <p><?= $dados['sobrenome'] ?></p>
                        </div>

                    </div>
                    <!-- Fim Campo com o sobrenome do usuário -->

                    <!-- Campo com o email do usuário -->
                    <div class="re-email">

                        <div class="e-email">
                            <p>Email: </p>
                        </div>

                        <div class="u-email">
                            <p><?= $dados['email'] ?></p>
                        </div>

                    </div>
                    <!-- Fim Campo com o email do usuário -->

                    <!-- Campo com o telefone/celular do usuário -->
                    <div class="re-tel">

                        <div class="e-tel">
                            <p>Telefone/cell: </p>
                        </div>

                        <div class="u-tel">
                            <p><?= $dados['telefone'] ?></p>
                        </div>

                    </div>
                    <!-- FIm Campo com o telefone/celular do usuário -->

                </div>
                <!-- fim Tabela dos dados -->

                <!-- Botão para editar os dados cadastrados pelo usuário -->
                <div class="editar-dados">
                    <a href="editaDados.php">
                        <p>Editar seus dados</p>
                    </a>
                </div>
                <!-- FIm Botão para editar os dados cadastrados pelo usuário -->

            </div>
            <!-- Fim Todo o conteudo dos dados -->

        </div>
        <!-- Fim da parte dados -->

        <!-- Começo da parte enderecos -->
        <div class="enderecos">

            <!-- Atalho para os endereços -->
            <div class="card-enderecos" id="card-enderecos">
                <span class="material-symbols-outlined" id="enderecos">
                    location_on
                </span>
                <p>Endereços</p>
                <span class="material-symbols-outlined chevron" id="chevron-enderecos">chevron_right</span>
            </div>
            <!-- Fim Atalho para os endereços -->

            <!-- Todo o conteudo dos endereços -->
            <div class="tudo-conteudo-enderecos">

                <!-- Botão para adicionar endereços -->
                <div class="adicionar-enderecos">
                    <a href="adicionaEndereco.php">
                        <p>Adicionar um novo endereço</p>
                    </a>
                </div>
                <!-- Fim Botão para adicionar endereços -->

                <?php if (mysqli_num_rows($resultadoEnd) == 0) {
                    $_SESSION['end-vazio'] = true;
                }
                ?>

                <?php
                //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                if (isset($_SESSION['end-vazio'])) :

                ?>

                    <!-- Mensagem caso não tenho nenhum endereço cadastrado -->
                    <div class="carrinho-vazio">
                        <p>Você não tem endereços cadastrados!</p>
                    </div>
                    <!-- Fim Mensagem caso não tenho nenhum endereço cadastrado -->


                <?php
                endif;
                unset($_SESSION['end-vazio']);
                ?>

                <!-- Uma parte dos enderecos -->
                <?php
                mysqli_data_seek($resultadoEnd, 0);
                while ($endereco = mysqli_fetch_assoc($resultadoEnd)) :
                ?>

                    <!-- Tabela dos endereços cadastrados -->
                    <div class="tabela-carrinho">

                        <!-- Nome do endereço cadastrado -->
                        <div class="nome-enderecos-cadastrados">
                            <p><?= $endereco['nome_end'] ?></p>
                        </div>
                        <!-- Fim Nome do endereço cadastrado -->


                        <!-- Botão para editar o endereço cadastrado -->
                        <div class="editar-tabela-carrinho">
                            <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                        </div>
                        <!-- Fim Botão para editar o endereço cadastrado -->

                        <!-- Botão para excluir o endereço cadastrado -->
                        <div class="excluir-tabela-cad">
                        <?php echo '<a href="includes/deletaEndereco.php?id=' . $endereco['idendereco'] .  '">' ?><span class="material-symbols-outlined" id="delete-cad">delete</span></a></a>
                        </div>
                        <!-- Fim Botão para excluir o endereço cadastrado -->

                    </div>
                    <!-- Fim Tabela dos endereços cadastrados -->


                    <!-- Começo do editar endereço cadastrado (só aparecerá caso o usuário clique no botão de editar endereço) -->
                    <div class="container-editar-produto">

                        <form action="includes/editaEnderecoBanco.php?id=<?php echo $id_usuario ?>" method="post">

                            <!-- Conteudo do nome do endereço -->
                            <div class="conteudo-re-enderecos">

                                <div class="re-enderecos">

                                    <div class="e-enderecos">
                                        <p>Nome do endereço: </p>
                                    </div>

                                    <!-- Nome do endereço -->
                                    <div class="u-enderecos">
                                        <p><?= $endereco['nome_end'] ?></p>
                                    </div>
                                    <!-- Fim Nome do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o nome do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="u-nomesS" placeholder="Digite o novo nome" name="nome">
                                </div>
                                <!-- Fim Caixa de texto para alterar o nome do endereço -->

                            </div>
                            <!-- Fim Conteudo do nome do endereço -->

                            <!-- Conteudo do CEP do endereço -->
                            <div class="conteudo-re-cep-enderecos">

                                <div class="re-cep-enderecos">

                                    <div class="e-cep-enderecos">
                                        <p>CEP: </p>
                                    </div>

                                    <!-- Número do CEP do endereço -->
                                    <div class="u-cep-enderecos">
                                        <p><?= $endereco['cep'] ?></p>
                                    </div>
                                    <!-- Fim Número do CEP do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o CEP do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo CEP" name="cep">
                                </div>
                                <!-- FIm Caixa de texto para alterar o CEP do endereço -->

                            </div>
                            <!-- Fim Conteudo do CEP do endereço -->

                            <!-- Conteudo do nome da cidade do endereço -->
                            <div class="conteudo-re-cidade">
                                <div class="re-cidade">

                                    <div class="e-cidade">
                                        <p>Cidade: </p>
                                    </div>

                                    <!-- Nome da cidade do endereço -->
                                    <div class="u-cidade">
                                        <p><?= $endereco['cidade'] ?></p>
                                    </div>
                                    <!-- Fim Nome da cidade do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o nome da cidade do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite a nova cidade" name="cidade">
                                </div>
                                <!-- Fim Caixa de texto para alterar o nome da cidade do endereço -->

                            </div>
                            <!-- Fim Conteudo do nome da cidade do endereço -->

                            <!-- Conteudo do nome do bairro do endereço -->
                            <div class="conteudo-re-bairro">
                                <div class="re-bairro">

                                    <div class="e-bairro">
                                        <p>Bairro: </p>
                                    </div>

                                    <!-- Nome do bairro do endereço -->
                                    <div class="u-bairro">
                                        <p><?= $endereco['bairro'] ?></p>
                                    </div>
                                    <!-- Fim Nome do bairro do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o nome do bairro do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo bairro" name="bairro">
                                </div>
                                <!-- Fim Caixa de texto para alterar o nome do bairro do endereço -->

                            </div>
                            <!-- Fim Conteudo do nome do bairro do endereço -->

                            <!-- Conteudo do nome da rua do endereço -->
                            <div class="conteudo-re-rua">
                                <div class="re-rua">

                                    <div class="e-rua">
                                        <p>Rua: </p>
                                    </div>

                                    <!-- Nome da rua do endereço -->
                                    <div class="u-rua">
                                        <p><?= $endereco['rua'] ?></p>
                                    </div>
                                    <!-- Fim Nome da rua do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o nome da rua do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite a nova rua" name="rua">
                                </div>
                                <!-- Fim Caixa de texto para alterar o nome da rua do endereço -->

                            </div>
                            <!-- Fim Conteudo do nome da rua do endereço -->

                            <!-- Conteudo do número do endereço -->
                            <div class="conteudo-re-numero">
                                <div class="re-numero">

                                    <div class="e-numero">
                                        <p>Número: </p>
                                    </div>

                                    <!-- Número do endereço -->
                                    <div class="u-numero">
                                        <p><?= $endereco['numero'] ?></p>
                                    </div>
                                    <!-- Fim Número do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o número do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo número" name="numero">
                                </div>
                                <!-- Fim Caixa de texto para alterar o número do endereço -->

                            </div>
                            <!-- Fim Conteudo do número do endereço -->

                            <!-- Conteudo do complemento do endereço -->
                            <div class="conteudo-complemento-enderecos">
                                <div class="re-complemento-enderecos">

                                    <div class="e-complemento-enderecos">
                                        <p>Complemento: </p>
                                    </div>

                                    <!-- Complemento do endereço -->
                                    <div class="u-complemento-enderecos">
                                        <p><?= $endereco['complemento'] ?></p>
                                    </div>
                                    <!-- Fim Complemento do endereço -->

                                </div>

                                <!-- Caixa de texto para alterar o complemento do endereço -->
                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo complemento" name="complemento">
                                </div>
                                <!-- Fim Caixa de texto para alterar o complemento do endereço -->

                            </div>
                            <!-- Fim Conteudo do complemento do endereço -->

                            <!-- Botão salvar as alterações do endereço cadastrado -->
                            <div class="salvar-alt-prod">

                                <div class="btn-slavar-alt-prod">
                                    <input type="submit" value="Salvar alterações">
                                </div>

                            </div>
                            <!-- Fim Botão salvar as alterações do endereço cadastrado -->

                        </form>

                    </div>
                    <!-- Fim Começo do editar endereço cadastrado (só aparecerá caso o usuário clique no botão de editar endereço) -->

                <?php
                endwhile;
                ?>

                <!-- Fim Uma parte dos enderecos -->

            </div>
            <!-- Fim Todo o conteudo dos endereços -->

        </div>
        <!-- Fim da parte enderecos -->

        <!-- Começo da parte cadastrados -->

        <!-- Todo o conteudo dos produtos cadastrados -->
        <div class="cadastrados">

            <!-- Atalho para os produtos cadastrados -->
            <div class="card-cadastrados" id="card-cadastrados">
                <span class="material-symbols-outlined" id="bookmark_manager">bookmark_manager</span>
                <p>Produtos cadastrados</p>
                <span class="material-symbols-outlined chevron" id="chevron-cadastrados">chevron_right</span>
            </div>
        <!-- Fim Atalho para os produtos cadastrados -->

            <!-- Começo de um produto cadastrado -->

            <!-- Todo o conteudo da tabela dos produtos cadastrados -->
            <div class="conteudo-cadastrados" id="conteudo-cadastrados">

                <!-- Tabela dos produtos cadastrados -->
                <div class="tabela-cadastrados" id="tabela-cadastrados">

                    <!-- Todo o conteudo dos produtos cadastrados -->
                    <div class="conteudo-carrinho-cadastrados">
                        <?php if ($id_usuario == 3) : ?>

                            <?php
                            mysqli_data_seek($resultadoCadProdAdm, 0);
                            while ($itemCadProdAdm = mysqli_fetch_assoc($resultadoCadProdAdm)) : ?>
                                <?php
                                $idproduto = $itemCadProdAdm['idproduto'];
                                ?>

                                <!-- Tabela dos produtos cadastrados -->
                                <div class="tabela-carrinho">

                                    <!-- Imagem do produto cadastrado -->
                                    <div class="imagem-tabela-carrinho">
                                        <a href=""><img src="<?= $itemCadProdAdm['path'] ?>" alt="" height="110px" width="100px"></a>
                                    </div>
                                    <!-- Fim Imagem do produto cadastrado -->

                                    <!-- Preço do produto cadastrado -->
                                    <div class="texto-tabela-carrinho">

                                        <div class="preco-tabela-carrinho">
                                            <p>R$ <?= $itemCadProdAdm['valor'] ?></p>
                                        </div>

                                        <div class="desc-tabela-carrinho">
                                            <p><?= $itemCadProdAdm['nome_prod'] ?></p>
                                        </div>

                                    </div>
                                    <!-- Fim Preço do produto cadastrado -->

                                    <!-- Botão para editar o produto cadastrado -->
                                    <div class="editar-tabela-carrinho">
                                        <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                    </div>
                                    <!-- FIm Botão para editar o produto cadastrado -->

                                    <!-- Botão para excluir o produto cadastrado -->
                                    <div class="excluir-tabela-cad">
                                        <?php
                                        echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdAdm['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                        ?>
                                    </div>
                                    <!-- Fim Botão para excluir o produto cadastrado -->

                                </div>
                                <!-- Fim Tabela dos produtos cadastrados -->

                                <!-- Começo do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->
                                <div class="container-editar-produto">
                                    <form action="includes/editaProd.php?id=<?= $itemCadProdAdm['idproduto'] ?>" method="post">

                                        <!-- Título preço -->
                                        <div class="titulo-preco">
                                            <p>Preço</p>
                                        </div>
                                        <!-- Fim Título preço -->

                                        <!-- Conteudo do preço do produto cadastrado -->
                                        <div class="linha1-editar-produtos">

                                            <!-- Preço original -->
                                            <div class="col-precoO">
                                                
                                                <div class="e-precoO">
                                                    <p>Preço original:</p>
                                                </div>

                                                <div class="u-precoO">
                                                    <p><?= $itemCadProdAdm['valor'] ?></p>
                                                </div>

                                            </div>
                                            <!-- Fim Preço original -->

                                            <!-- Preço novo -->
                                            <div class="col-precoN">

                                                <div class="e-precoN">
                                                    <p>Novo preço:</p>
                                                </div>

                                                <!-- Caixa de texto para o Preço novo -->
                                                <div class="u-precoN">
                                                    <input type="text" id="u-precoN" name="novoPreco">
                                                </div>
                                                <!-- Fim Caixa de texto para o Preço novo -->

                                            </div>
                                            <!-- Fim Preço novo -->

                                        </div>
                                        <!-- Fim Conteudo do preço do produto cadastrado -->

                                        <!-- Conteudo do nome simples do produto cadastrado -->
                                        <div class="linha2-editar-produtos">

                                            <!-- Nome simples novo -->
                                            <div class="col-nomeS">

                                                <div class="e-nomeS">
                                                    <p>Nome simples: </p>
                                                </div>

                                                <!-- Caixa de texto para o Nome simples novo -->
                                                <div class="u-nomeS">
                                                    <input type="text" id="u-nomesS" name="novoNome">
                                                </div>
                                                <!-- Fim Caixa de texto para o Nome simples novo -->

                                            </div>
                                            <!-- Fim Nome simples novo -->

                                        </div>
                                        <!-- Fim Conteudo do nome simples do produto cadastrado -->

                                        <!-- Conteudo da descrição do produto cadastrado -->
                                        <div class="linha3-editar-produtos">

                                            <!-- Descrição novo -->
                                            <div class="col-desc">

                                                <div class="e-desc">
                                                    <p>Descrição: </p>
                                                </div>

                                                <!-- Caixa de texto para o Nome simples novo -->
                                                <div class="u-desc">
                                                    <input type="text" id="u-desc" name="novaDesc">
                                                </div>
                                                <!-- Fim Caixa de texto para o Nome simples novo -->

                                            </div>
                                            <!-- Fim Descrição novo -->

                                        </div>
                                        <!-- Fim Conteudo da descrição do produto cadastrado -->

                                        <!-- Conteudo da tipo do produto cadastrado -->
                                        <div class="linha4-editar-produtos">

                                            <!-- Tipo novo -->
                                            <div class="col-tipo">

                                                <div class="e-tipo">
                                                    <p>Tipo do produto: </p>
                                                </div>

                                                <!-- Caixa de seleção do tipo novo -->
                                                <div class="u-tipo">

                                                    <input type="radio" id="a" name="categoria" value="Masculina"><label for="a">Masculina</label><br>
                                                    <input type="radio" id="b" name="categoria" value="Feminina"><label for="b">Feminino</label><br>
                                                    <input type="radio" id="c" name="categoria" value="Kids"><label for="c">Kids</label><br>

                                                </div>
                                                <!-- Fim Caixa de seleção do tipo novo -->

                                            </div>
                                            <!-- Fim Tipo novo -->

                                        </div>
                                        <!-- Fim Conteudo da tipo do produto cadastrado -->

                                        <!-- Conteudo da condição do produto cadastrado -->
                                        <div class="linha5-editar-produtos">

                                            <!-- Condição novo -->
                                            <div class="col-cond">

                                                <div class="e-cond">
                                                    <p>Condição do produto: </p>
                                                </div>

                                                <!-- Caixa de seleção da condição novo -->
                                                <div class="u-cond">

                                                    <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                    <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                    <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                </div>
                                                <!-- Fim Caixa de seleção da condição novo -->

                                            </div>
                                            <!-- Fim Condição novo -->

                                        </div>
                                        <!-- Fim Conteudo da condição do produto cadastrado -->

                                        <!-- Conteudo da subcategoria do produto cadastrado -->
                                        <div class="linha6-editar-produtos-">

                                            <!-- Subcategoria novo -->
                                            <div class="col-sub">

                                                <div class="e-sub">
                                                    <p>SubCategoria: </p>
                                                </div>

                                                <!-- Caixa de seleção da condição novo -->
                                                <div class="u-sub">

                                                    <select name="" id="" name="subcategoria">
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

                                                </div>
                                                 <!-- Fim Caixa de seleção da condição novo -->

                                            </div>
                                            <!-- Fim Subcategoria novo -->

                                        </div>
                                        <!-- Fim Conteudo da subcategoria do produto cadastrado -->

                                        <!-- Botão para  salvar as alterções do produto cadastrado -->
                                        <div class="salvar-alt-prod">

                                            <div class="btn-slavar-alt-prod">
                                                <input type="submit" value="Salvar alterações">
                                            </div>

                                        </div>
                                        <!-- Fim Botão para  salvar as alterções do produto cadastrado -->

                                    </form>

                                </div>
                                <!-- Fim do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->

                                <!-- Fim de um produto cadastrado -->









                            <!-- Começo de um produto cadastrado ADM -->

                            <?php endwhile; ?>

                        <?php else : ?>

                            <?php
                            mysqli_data_seek($resultadoCadProd, 0);
                            while ($itemCadProd = mysqli_fetch_assoc($resultadoCadProd)) : ?>
                                <?php
                                $idproduto = $itemCadProd['idproduto'];
                                ?>

                                <!-- Tabela dos produtos cadastrados -->
                                <div class="tabela-carrinho">

                                    <!-- Imagem do produto cadastrado -->
                                    <div class="imagem-tabela-carrinho">
                                        <a href=""><img src="<?= $itemCadProdAdm['path'] ?>" alt="" height="110px" width="100px"></a>
                                    </div>
                                    <!-- Fim Imagem do produto cadastrado -->

                                    <!-- Preço do produto cadastrado -->
                                    <div class="texto-tabela-carrinho">

                                        <div class="preco-tabela-carrinho">
                                            <p>R$ <?= $itemCadProdAdm['valor'] ?></p>
                                        </div>

                                        <div class="desc-tabela-carrinho">
                                            <p><?= $itemCadProdAdm['nome_prod'] ?></p>
                                        </div>

                                    </div>
                                    <!-- Fim Preço do produto cadastrado -->

                                    <!-- Botão para editar o produto cadastrado -->
                                    <div class="editar-tabela-carrinho">
                                        <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                    </div>
                                    <!-- FIm Botão para editar o produto cadastrado -->

                                    <!-- Botão para excluir o produto cadastrado -->
                                    <div class="excluir-tabela-cad">
                                        <?php
                                        echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdAdm['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                        ?>
                                    </div>
                                    <!-- Fim Botão para excluir o produto cadastrado -->

                                </div>
                                <!-- Fim Tabela dos produtos cadastrados -->

                                <!-- Começo do editar cadastrados -->

                                <!-- Começo do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->
                                <div class="container-editar-produto">
                                    <form action="includes/editaProd.php?id=<?= $itemCadProdAdm['idproduto'] ?>" method="post">

                                        <!-- Título preço -->
                                        <div class="titulo-preco">
                                            <p>Preço</p>
                                        </div>
                                        <!-- Fim Título preço -->

                                        <!-- Conteudo do preço do produto cadastrado -->
                                        <div class="linha1-editar-produtos">

                                            <!-- Preço original -->
                                            <div class="col-precoO">
                                                
                                                <div class="e-precoO">
                                                    <p>Preço original:</p>
                                                </div>

                                                <div class="u-precoO">
                                                    <p><?= $itemCadProdAdm['valor'] ?></p>
                                                </div>

                                            </div>
                                            <!-- Fim Preço original -->

                                            <!-- Preço novo -->
                                            <div class="col-precoN">

                                                <div class="e-precoN">
                                                    <p>Novo preço:</p>
                                                </div>

                                                <!-- Caixa de texto para o Preço novo -->
                                                <div class="u-precoN">
                                                    <input type="text" id="u-precoN" name="novoPreco">
                                                </div>
                                                <!-- Fim Caixa de texto para o Preço novo -->

                                            </div>
                                            <!-- Fim Preço novo -->

                                        </div>
                                        <!-- Fim Conteudo do preço do produto cadastrado -->

                                        <!-- Conteudo do nome simples do produto cadastrado -->
                                        <div class="linha2-editar-produtos">

                                            <!-- Nome simples novo -->
                                            <div class="col-nomeS">

                                                <div class="e-nomeS">
                                                    <p>Nome simples: </p>
                                                </div>

                                                <!-- Caixa de texto para o Nome simples novo -->
                                                <div class="u-nomeS">
                                                    <input type="text" id="u-nomesS" name="novoNome">
                                                </div>
                                                <!-- Fim Caixa de texto para o Nome simples novo -->

                                            </div>
                                            <!-- Fim Nome simples novo -->

                                        </div>
                                        <!-- Fim Conteudo do nome simples do produto cadastrado -->

                                        <!-- Conteudo da descrição do produto cadastrado -->
                                        <div class="linha3-editar-produtos">

                                            <!-- Descrição novo -->
                                            <div class="col-desc">

                                                <div class="e-desc">
                                                    <p>Descrição: </p>
                                                </div>

                                                <!-- Caixa de texto para o Nome simples novo -->
                                                <div class="u-desc">
                                                    <input type="text" id="u-desc" name="novaDesc">
                                                </div>
                                                <!-- Fim Caixa de texto para o Nome simples novo -->

                                            </div>
                                            <!-- Fim Descrição novo -->

                                        </div>
                                        <!-- Fim Conteudo da descrição do produto cadastrado -->

                                        <!-- Conteudo da tipo do produto cadastrado -->
                                        <div class="linha4-editar-produtos">

                                            <!-- Tipo novo -->
                                            <div class="col-tipo">

                                                <div class="e-tipo">
                                                    <p>Tipo do produto: </p>
                                                </div>

                                                <!-- Caixa de seleção do tipo novo -->
                                                <div class="u-tipo">

                                                    <input type="radio" id="a" name="categoria" value="Masculina"><label for="a">Masculina</label><br>
                                                    <input type="radio" id="b" name="categoria" value="Feminina"><label for="b">Feminino</label><br>
                                                    <input type="radio" id="c" name="categoria" value="Kids"><label for="c">Kids</label><br>

                                                </div>
                                                <!-- Fim Caixa de seleção do tipo novo -->

                                            </div>
                                            <!-- Fim Tipo novo -->

                                        </div>
                                        <!-- Fim Conteudo da tipo do produto cadastrado -->

                                        <!-- Conteudo da condição do produto cadastrado -->
                                        <div class="linha5-editar-produtos">

                                            <!-- Condição novo -->
                                            <div class="col-cond">

                                                <div class="e-cond">
                                                    <p>Condição do produto: </p>
                                                </div>

                                                <!-- Caixa de seleção da condição novo -->
                                                <div class="u-cond">

                                                    <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                    <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                    <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                </div>
                                                <!-- Fim Caixa de seleção da condição novo -->

                                            </div>
                                            <!-- Fim Condição novo -->

                                        </div>
                                        <!-- Fim Conteudo da condição do produto cadastrado -->

                                        <!-- Conteudo da subcategoria do produto cadastrado -->
                                        <div class="linha6-editar-produtos-">

                                            <!-- Subcategoria novo -->
                                            <div class="col-sub">

                                                <div class="e-sub">
                                                    <p>SubCategoria: </p>
                                                </div>

                                                <!-- Caixa de seleção da condição novo -->
                                                <div class="u-sub">

                                                    <select name="" id="" name="subcategoria">
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

                                                </div>
                                                 <!-- Fim Caixa de seleção da condição novo -->

                                            </div>
                                            <!-- Fim Subcategoria novo -->

                                        </div>
                                        <!-- Fim Conteudo da subcategoria do produto cadastrado -->

                                        <!-- Botão para  salvar as alterções do produto cadastrado -->
                                        <div class="salvar-alt-prod">

                                            <div class="btn-slavar-alt-prod">
                                                <input type="submit" value="Salvar alterações">
                                            </div>

                                        </div>
                                        <!-- Fim Botão para  salvar as alterções do produto cadastrado -->

                                    </form>

                                </div>

                                <!-- Fim de um produto cadastrado -->


                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <!-- Todo o conteudo dos produtos cadastrados -->

                </div>
                <!-- Fim Tabela dos produtos cadastrados -->

            </div>
            <!-- Fim Todo o conteudo da tabela dos produtos cadastrados -->

        </div>
        <!-- Todo o conteudo dos produtos cadastrados -->

    </div>
    <!-- Fim Todo o conteudo da parte do card para dispositivos mobile -->




    <!-- Todo o conteudo da parte para desktop -->
    <div class="tudo-tudo-desktop">

        <!-- Todo o conteudo dos cards para desktop -->
        <div class="tudo-card-desktop">

            <!-- Todo o conteudo do card para desktop -->
            <div class="card-desktop">

                <!-- Atalho para o carrinho de compras -->
                <div class="card-carrinho-desktop">

                    <div class="card-carrinho-desktop" id="card-carrinho-desktop">
                        <span class="material-symbols-outlined" id="shopping_cart">shopping_cart</span>
                        <p>Meu carrinho de compras</p>
                        <span class="material-symbols-outlined chevron" id="chevron-carrinho">chevron_right</span>
                    </div>

                </div>
                <!-- Fim Atalho para o carrinho de compras -->

            </div>

            <!-- Atalho para os dados -->
            <div class="card-dados-desktop">

                <div class="card-dados-desktop" id="card-dados-desktop">
                    <span class="material-symbols-outlined" id="database">database</span>
                    <p>Meus dados</p>
                    <span class="material-symbols-outlined chevron" id="chevron-dados">chevron_right</span>
                </div>

            </div>
            <!-- Fim Atalho para os dados -->

            <!-- Atalho para os endereços -->
            <div class="card-enderecos-desktop">

                <div class="card-enderecos-desktop" id="card-enderecos-desktop">
                    <span class="material-symbols-outlined" id="enderecos">
                        location_on
                    </span>
                    <p>Endereços</p>
                    <span class="material-symbols-outlined chevron" id="chevron-enderecos-desktop">chevron_right</span>
                </div>

            </div>
            <!-- Fim Atalho para os endereços -->

            <!-- Atalho para os produtos cadastrados -->
            <div class="card-cadastrados-desktop">

                <div class="card-cadastrados-desktop" id="card-cadastrados-desktop">
                    <span class="material-symbols-outlined" id="bookmark_manager">bookmark_manager</span>
                    <p>Produtos cadastrados</p>
                    <span class="material-symbols-outlined chevron" id="chevron-cadastrados">chevron_right</span>
                </div>

            </div>
            <!-- Fim Atalho para os produtos cadastrados -->

        </div>
        <!-- Fim Todo o conteudo dos cards para desktop -->

            <!-- Todo o conteudo da tabela para desktop -->
            <div class="tabelas-desktop">

                <!-- Todo o conteudo do atalho para o carrinho de compras -->
                <div class="conteudo-carrinho-desktop" id="conteudo-carrinho-desktop">

                    <!-- começo carrinho -->
                    <?php if (mysqli_num_rows($resultadoCarrinhoDesk) == 0) {
                        $_SESSION['carrinho-vazio'] = true;
                    }
                    ?>

                    <?php
                    //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                    if (isset($_SESSION['carrinho-vazio'])) :

                    ?>

                        <!-- Menssagem caso o carrinho de compras esteja vazio -->
                        <div class="cadastrados-vazio-desktop" id="carrinho-vazio-cadastrados-desktop">
                            <p>O seu carrinho está vazio!</p>
                        </div>
                        <!-- Fim Menssagem caso o carrinho de compras esteja vazio -->


                    <?php
                    endif;
                    unset($_SESSION['carrinho-vazio']);
                    ?>

                    <?php
                    unset($_SESSION['usuario_existe']);
                    while ($itemCarrinhoDesk = mysqli_fetch_assoc($resultadoCarrinhoDesk)) : ?>
                        <?php
                        $idprodutoDesk = $itemCarrinhoDesk['idproduto'];
                        $consultaProdutoDesk = "SELECT * FROM cadastro_prod WHERE idproduto = '$idprodutoDesk'";
                        $resultadoProdutoDesk = mysqli_query($conexao, $consultaProdutoDesk);
                        $produtoDesk = mysqli_fetch_assoc($resultadoProdutoDesk);
                        ?>

                        <!-- Todo o conteudo da tabela carrinho de compras -->
                        <div class="conteudo-total-tabela-carrinho-desktop">

                            <!-- Tabela do carrinho de compras -->
                            <div class="tabela-carrinho-desktop">


                                <!-- Imagem do produto adicionado no carrinho de compras -->
                                <div class="imagem-tabela-carrinho-desktop">
                                    <?php echo '<a href="">' ?><img src="<?= $produtoDesk['path'] ?>" alt="" height="110px" width="100px"></a>
                                </div>
                                <!-- Fim Imagem do produto adicionado no carrinho de compras -->

                                <!-- Conteudo do texto do produto adicionado no carrinho de compras -->
                                <div class="texto-tabela-carrinho-desktop" id="primeiro-card">
                                    
                                    <!-- Preço do produto adicionado no carrinho de compras -->
                                    <div class="preco-tabela-carrinho-desktop">
                                        <p>R$ <?= $produtoDesk['valor'] ?></p>
                                    </div>
                                    <!-- Fim Preço do produto adicionado no carrinho de compras -->

                                    <!-- Descrição do produto adicionado no carrinho de compras -->
                                    <div class="desc-tabela-carrinho-desktop">
                                        <p><?= $produtoDesk['nome_prod'] ?></p>
                                    </div>
                                    <!-- Fim Descrição do produto adicionado no carrinho de compras -->

                                </div>
                                <!-- Fim Conteudo do texto do produto adicionado no carrinho de compras -->

                                <!-- Botão para excluir do produto adicionado no carrinho de compras -->
                                <div class="excluir-tabela-carrinho-desktop">
                                    <?php
                                    echo '<a href="includes/deletar.php?id= ' . $produtoDesk['idproduto'] . '"><span class="material-symbols-outlined" id="delete">delete</span></a>';
                                    ?>
                                </div>
                                <!-- Fim Botão para excluir do produto adicionado no carrinho de compras -->

                            </div>
                            <!-- Fim Tabela do carrinho de compras -->

                            <!-- Botão para fechar compra do produto adicionado no carrinho de compras -->
                            <div class="confirmar-carrinho-desktop">

                                <?php echo '<a href="finalizar-compra.php?id= ' . $produtoDesk['idproduto'] . '">';
                                ?>
                                <div class="texto-confirmar-carrinho-desktop">
                                    <p>Fechar compra</p>
                                </div>
                                </a>

                            </div>
                             <!-- Fim Botão para fechar compra do produto adicionado no carrinho de compras -->

                        </div>
                        <!-- Fim Todo o conteudo da tabela carrinho de compras -->


                    <?php endwhile; ?>
                    <!-- Parte do botão de fechar compra -->
                    <!-- Fim parte do botão de fechar compra -->

                </div>
                <!-- Fim Todo o conteudo do atalho para o carrinho de compras -->

                

                <?php
                $consultaDadosDesk = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
                $resultadoDadosDesk = mysqli_query($conexao, $consultaDadosDesk);
                $dadosDesk = mysqli_fetch_assoc($resultadoDadosDesk);
                ?>

                <!-- Todo o conteudo dos dados -->
                <div class="conteudo-dados-desktop" id="conteudo-dados-desktop">

                    <!-- Tabela dos dados -->
                    <div class="tabela-dados-desktop">

                        <!-- Campo com o nome do usuário -->
                        <div class="re-nome-desktop">

                            <div class="e-nome-desktop">
                                <p>Nome: </p>
                            </div>

                            <div class="u-nome-desktop">
                                <p><?= $dadosDesk['nome'] ?> </p>
                            </div>

                        </div>
                        <!-- Fim Campo com o nome do usuário -->

                        <!-- Campo com o sobrenome do usuário -->
                        <div class="re-sobrenome-desktop">

                            <div class="e-sobrenome-desktop">
                                <p>Sobrenome: </p>
                            </div>

                            <div class="u-sobrenome-desktop">
                                <p><?= $dadosDesk['sobrenome'] ?></p>
                            </div>

                        </div>
                        <!-- Fim Campo com o sobrenome do usuário -->

                        <!-- Campo com o email do usuário -->
                        <div class="re-email-desktop">

                            <div class="e-email-desktop">
                                <p>Email: </p>
                            </div>

                            <div class="u-email-desktop">
                                <p><?= $dadosDesk['email'] ?></p>
                            </div>

                        </div>
                        <!-- Fim Campo com o email do usuário -->

                        <!-- Campo com o telefone/celular do usuário -->
                        <div class="re-tel-desktop">

                            <div class="e-tel-desktop">
                                <p>Telefone/cell: </p>
                            </div>

                            <div class="u-tel-desktop">
                                <p><?= $dadosDesk['telefone'] ?></p>
                            </div>

                        </div>
                        <!-- Fim Campo com o telefone/celular do usuário -->

                    </div>
                    <!-- Fim Tabela dos dados -->

                    <!-- Espaço do Botão para editar os dados cadastrados pelo usuário -->
                    <div class="espaco-editar-dados-desktop">

                        <!-- Botaão para editar os dados cadastrados pelo usuário -->
                        <div class="editar-dados-desktop">
                            <a href="editaDados.php">
                                <p>Editar seus dados</p>
                            </a>
                        </div>
                        <!-- Botão para editar os dados cadastrados pelo usuário -->

                    </div>
                    <!-- Fim Espaço do Botão para editar os dados cadastrados pelo usuário -->

                </div>
                <!-- Fim Todo o conteudo dos dados -->


                <!-- Todo o conteudo dos endereços -->
                <div class="enderecos-desktop">

                    <!-- Botão para adicionar endereços -->
                    <div class="adicionar-enderecos-desktop">
                        <a href="adicionaEndereco.php">
                            <p>Adicionar um novo endereço</p>
                        </a>
                    </div>
                    <!-- Fim Botão para adicionar endereços -->

                    <?php if (mysqli_num_rows($resultadoEndDesk) == 0) {
                        $_SESSION['end-vazioDesk'] = true;
                    }
                    ?>

                    <?php
                    //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                    if (isset($_SESSION['end-vazioDesk'])) :

                    ?>

                        <!-- Mensagem caso não tenho nenhum endereço cadastrado -->
                        <div class="carrinho-vazio">
                            <p>Você não tem endereços cadastrados!</p>
                        </div>
                        <!-- Fim Mensagem caso não tenho nenhum endereço cadastrado -->

<!-- Uma parte dos enderecos -->

                    <?php
                    endif;
                    unset($_SESSION['end-vazioDesk']);
                    ?>

                    <!-- Todo o conteudo da Tabela dos endereços cadastrados -->
                    <div class="conteudo-re-cep-enderecos-desktop">

                        <?php
                        mysqli_data_seek($resultadoEndDesk, 0);
                        while ($enderecoDesk = mysqli_fetch_assoc($resultadoEndDesk)) :
                        ?>

                            <!-- Tabela dos endereços cadastrados -->
                            <div class="tabela-carrinho-desktop" id="tabela-carrinho-desktop-ENDERECO">

                                <!-- Nome do endereço cadastrado -->
                                <div class="nome-enderecos-cadastrados-desktop">
                                    <p><?= $enderecoDesk['nome_end'] ?></p>
                                </div>
                                <!-- Fim Nome do endereço cadastrado -->

                                <!-- Botão para editar o endereço cadastrado -->
                                <div class="editar-tabela-carrinho-desktop">
                                    <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                </div>
                                <!-- Fim Botão para editar o endereço cadastrado -->

                                <!-- Botão para excluir o endereço cadastrado -->
                                <div class="excluir-tabela-cad-desktop">
                                    <?php echo '<a href="includes/deletaEndereco.php?id=' . $enderecoDesk['idendereco'] .  '">' ?><span class="material-symbols-outlined" id="delete-cad">delete</span></a>
                                </div>
                                <!-- Fim Botão para excluir o endereço cadastrado -->

                            </div>
                            <!-- Fim Tabela dos endereços cadastrados -->


                            <!-- Começo do editar endereço cadastrado (só aparecerá caso o usuário clique no botão de editar endereço) -->
                            <div class="container-editar-produto-desktop">

                                <!-- Conteudo do nome do endereço -->
                                <div class="conteudo-re-enderecos-desktop">

                                    <form action="includes/editaEnderecoBanco.php?id=<?php echo $id_usuario ?>" method="post">

                                        <div class="re-enderecos-desktop">

                                            <div class="e-enderecos-desktop">
                                                <p>Nome do endereço: </p>
                                            </div>

                                            <!-- Nome do endereço -->
                                            <div class="u-enderecos-desktop">
                                                <p><?= $enderecoDesk['nome_end'] ?></p>
                                            </div>
                                            <!-- Fim Nome do endereço -->

                                        </div>

                                         <!-- Caixa de texto para alterar o nome do endereço -->
                                        <div class="caixa-conteudo-re-enderecos-desktop">
                                            <input type="text" id="u-nomesS" placeholder="Digite o novo nome" name="nome">
                                        </div>
                                         <!-- Fim Caixa de texto para alterar o nome do endereço -->

                                </div>
                                 <!-- Fim Conteudo do nome do endereço -->

                                <!-- Conteudo do CEP do endereço -->
                                <div class="conteudo-re-cep-enderecos-desktop">

                                    <div class="re-cep-enderecos-desktop">

                                        <div class="e-cep-enderecos-desktop">
                                            <p>CEP: </p>
                                        </div>

                                        <!-- Número do CEP do endereço -->
                                        <div class="u-cep-enderecos-desktop">
                                            <p><?= $enderecoDesk['cep'] ?></p>
                                        </div>
                                        <!-- Fim Número do CEP do endereço -->

                                    </div>

                                    <!-- Caixa de texto para alterar o CEP do endereço -->
                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo CEP" name="cep">
                                    </div>
                                    <!-- Fim Caixa de texto para alterar o CEP do endereço -->

                                </div>
                                <!-- Fim Conteudo do CEP do endereço -->

                                <!-- Conteudo do nome da cidade do endereço -->
                                <div class="conteudo-re-cidade-desktop">

                                    <div class="re-cidade-desktop">

                                        <div class="e-cidade-desktop">
                                            <p>Cidade: </p>
                                        </div>

                                        <!-- Nome da cidade do endereço -->
                                        <div class="u-cidade-desktop">
                                            <p><?= $enderecoDesk['cidade'] ?></p>
                                        </div>
                                        <!--Fim Nome da cidade do endereço -->

                                    </div>

                                    <!-- Caixa de texto para alterar o nome da cidade do endereço -->
                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite a nova cidade" name="cidade">
                                    </div>
                                    <!-- Fim Caixa de texto para alterar o nome da cidade do endereço -->

                                </div>
                                <!-- Fim Conteudo do nome da cidade do endereço -->

                                <!-- Conteudo do nome do bairro do endereço -->
                                <div class="conteudo-re-bairro-desktop">

                                    <div class="re-bairro-desktop">

                                        <div class="e-bairro-desktop">
                                            <p>Bairro: </p>
                                        </div>

                                        <!-- Nome do bairro do endereço -->
                                        <div class="u-bairro-desktop">
                                            <p><?= $enderecoDesk['bairro'] ?></p>
                                        </div>
                                        <!-- FimNome do bairro do endereço -->

                                    </div>

                                    <!-- Caixa de texto para alterar o nome do bairro do endereço -->
                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo bairro" name="bairro">
                                    </div>
                                    <!-- Fim Caixa de texto para alterar o nome do bairro do endereço -->

                                </div>
                                <!-- Fim Conteudo do nome do bairro do endereço -->

                                <!-- Conteudo do nome da rua do endereço -->
                                <div class="conteudo-re-rua-desktop">

                                    <div class="re-rua-desktop">

                                        <div class="e-rua-desktop">
                                            <p>Rua: </p>
                                        </div>

                                        <!-- Nome da rua do endereço -->
                                        <div class="u-rua-desktop">
                                            <p><?= $enderecoDesk['rua'] ?></p>
                                        </div>
                                        <!-- Fim Nome da rua do endereço -->

                                    </div>

                                    <!-- Caixa de texto para alterar o nome da rua do endereço -->
                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite a nova rua" name="rua">
                                    </div>
                                    <!-- Fim Caixa de texto para alterar o nome da rua do endereço -->

                                </div>
                                <!-- Fim Conteudo do nome da rua do endereço -->

                                <!-- Conteudo do número do endereço -->
                                <div class="conteudo-re-numero-desktop">

                                    <div class="re-numero-desktop">

                                        <div class="e-numero-desktop">
                                            <p>Número: </p>
                                        </div>

                                        <!-- Número do endereço -->
                                        <div class="u-numero-desktop">
                                            <p><?= $enderecoDesk['numero'] ?></p>
                                        </div>
                                        <!-- Fim Número do endereço -->

                                    </div>

                                    <!-- Caixa de texto para alterar o número do endereço -->
                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo número" name="numero">
                                    </div>
                                    <!-- Fim Caixa de texto para alterar o número do endereço -->

                                </div>
                                <!-- Fim Conteudo do número do endereço -->

                                <!-- Conteudo do complemento do endereço -->
                                <div class="conteudo-complemento-enderecos-desktop">

                                    <div class="re-complemento-enderecos-desktop">

                                        <div class="e-complemento-enderecos-desktop">
                                            <p>Complemento: </p>
                                        </div>

                                        <!-- Complemento do endereço -->
                                        <div class="u-complemento-enderecos-desktop">
                                            <p><?= $enderecoDesk['complemento'] ?></p>
                                        </div>
                                        <!-- Fim Complemento do endereço -->

                                    </div>

                                    <!-- Caixa de texto para alterar o complemento do endereço -->
                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo complemento" name="complemento">
                                    </div>
                                    <!-- Fim Caixa de texto para alterar o complemento do endereço -->

                                </div>
                                <!-- Fim Conteudo do complemento do endereço -->

                                <!-- Botão salvar as alterações do endereço cadastrado -->
                                <div class="salvar-alt-prod">

                                    <div class="btn-slavar-alt-prod">
                                        <input type="submit" value="Salvar alterações">
                                    </div>

                                </div>
                                <!-- FIm Botão salvar as alterações do endereço cadastrado -->

                                </form>





                                </div>
                                <!-- Fim Começo do editar endereço cadastrado (só aparecerá caso o usuário clique no botão de editar endereço) -->

                            <?php
                            endwhile
                            ?>


                            



                    </div>
                    <!-- Fim Todo o conteudo da Tabela dos endereços cadastrados -->

<!-- Fim Uma parte dos enderecos -->

                </div>
                <!-- Fim Todo o conteudo dos endereços -->

<!-- Começo da parte cadastrados -->

<!-- Começo de um produto cadastrado -->

                <!-- Todo o conteudo da tabela dos produtos cadastrados -->
                <div class="conteudo-cadastrados-desktop" id="conteudo-cadastrados-desktop">

                    <!-- Tabela dos produtos cadastrados -->
                    <div class="tabela-cadastrados-desktop" id="tabela-cadastrados-desktop">

                        <!-- Todo o conteudo dos produtos cadastrados -->
                        <div class="conteudo-carrinho-cadastrados-desktop">

                            <?php if (mysqli_num_rows($resultadoCadProdDesk) == 0) {
                                $_SESSION['carrinho-vazio'] = true;
                            }
                            ?>

                            <?php
                            //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                            if (isset($_SESSION['carrinho-vazio'])) :

                            ?>

                                <!-- Mensagem caso não tenho nenhum endereço cadastrado -->
                                <div class="carrinho-vazio-desktop">
                                    <p>Você ainda não cadastrou nenhum produto.</p>
                                </div>
                                <!-- Fim Mensagem caso não tenho nenhum endereço cadastrado -->

                            <?php
                            endif;
                            unset($_SESSION['carrinho-vazio']);
                            ?>

                            <?php if ($id_usuario == 3) : ?>

                                <?php
                                mysqli_data_seek($resultadoCadProdDeskAdm, 0);
                                while ($itemCadProdDeskAdm = mysqli_fetch_assoc($resultadoCadProdDeskAdm)) : ?>
                                    <?php
                                    $idprodutoDesk = $itemCadProdDeskAdm['idproduto'];
                                    ?>

                                    <!-- Tabela dos produtos cadastrados -->
                                    <div class="tabela-carrinho-desktop">

                                        <!-- Imagem do produto cadastrado -->
                                        <div class="imagem-tabela-carrinho-desktop">
                                            <a href=""><img src="<?= $itemCadProdDeskAdm['path'] ?>" alt="" height="110px" width="100px"></a>
                                        </div>
                                        <!-- Fim Imagem do produto cadastrado -->

                                        <!-- Preço do produto cadastrado -->
                                        <div class="texto-tabela-carrinho-desktop">

                                            <div class="preco-tabela-carrinho-desktop">
                                                <p> R$ <?= $itemCadProdDeskAdm['valor'] ?></p>
                                            </div>

                                            <div class="desc-tabela-carrinho-desktop">
                                                <p><?= $itemCadProdDeskAdm['nome_prod'] ?></p>
                                            </div>

                                        </div>
                                        <!-- Fim Preço do produto cadastrado -->

                                        <!-- Botão para editar o produto cadastrado -->
                                        <div class="editar-tabela-carrinho-desktop">
                                            <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                        </div>
                                        <!-- Fim Botão para editar o produto cadastrado -->

                                        <!-- Botão para excluir o produto cadastrado -->
                                        <div class="excluir-tabela-cad-desktop">
                                            <?php
                                            echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdDeskAdm['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                            ?>
                                        </div>
                                        <!-- Fim Botão para excluir o produto cadastrado -->

                                    </div>
                                    <!-- Fim Tabela dos produtos cadastrados -->

                                    <!-- Começo do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->
                                    <div class="container-editar-produto-desktop">
                                        <form action="includes/editaProd.php?id=<?= $itemCadProdDeskAdm['idproduto'] ?>" method="post">

                                            <!-- Título preço -->
                                            <div class="titulo-preco-desktop">
                                                <p>Preço</p>
                                            </div>
                                            <!-- Fim Título preço -->

                                            <!-- Conteudo do preço do produto cadastrado -->
                                            <div class="linha1-editar-produtos-desktop">

                                                <!-- Preço original -->
                                                <div class="col-precoO-desktop">

                                                    <div class="e-precoO-desktop">
                                                        <p>Preço original:</p>
                                                    </div>

                                                    <div class="u-precoO-desktop">
                                                        <p><?= $itemCadProdDeskAdm['valor'] ?></p>
                                                    </div>

                                                </div>
                                                <!-- Fim Preço original -->

                                                <!-- Preço novo -->
                                                <div class="col-precoN-desktop">

                                                    <div class="e-precoN-desktop">
                                                        <p>Novo preço:</p>
                                                    </div>

                                                    <!-- Caixa de texto para o Preço novo -->
                                                    <div class="u-precoN-desktop">
                                                        <input type="text" id="u-precoN-desktop" name="novoPreco">
                                                    </div>
                                                    <!-- Fim Caixa de texto para o Preço novo -->

                                                </div>
                                                <!-- Fim Preço novo -->

                                            </div>
                                            <!-- Fim Conteudo do preço do produto cadastrado -->

                                            <!-- Conteudo do nome simples do produto cadastrado -->
                                            <div class="linha2-editar-produtos-desktop">

                                                <!-- Nome simples novo -->
                                                <div class="col-nomeS-desktop">

                                                    <div class="e-nomeS-desktop">
                                                        <p>Nome simples: </p>
                                                    </div>

                                                    <!-- Caixa de texto para o Nome simples novo -->
                                                    <div class="u-nomeS-desktop">
                                                        <input type="text" id="u-nomesS-desktop" name="novoNome">
                                                    </div>
                                                    <!-- Fim Caixa de texto para o Nome simples novo -->

                                                </div>
                                                <!-- Fim Nome simples novo -->

                                            </div>
                                            <!-- Fim Conteudo do nome simples do produto cadastrado -->
                                            
                                            <!-- Conteudo da descrição do produto cadastrado -->
                                            <div class="linha3-editar-produtos-desktop">

                                                <!-- Descrição novo -->
                                                <div class="col-desc-desktop">
                                                    
                                                    <div class="e-desc-desktop">
                                                        <p>Descrição: </p>
                                                    </div>

                                                    <!-- Caixa de texto para o Nome simples novo -->
                                                    <div class="u-desc-desktop">
                                                        <input type="text" id="u-desc-desktop" name="novaDesc">
                                                    </div>
                                                    <!-- Fim Caixa de texto para o Nome simples novo -->

                                                </div>
                                                <!-- Fim Descrição novo -->

                                            </div>
                                            <!-- Fim Conteudo da descrição do produto cadastrado -->

                                            <!-- Conteudo da tipo do produto cadastrado -->
                                            <div class="linha4-editar-produtos-desktop">

                                                <!-- Tipo novo -->
                                                <div class="col-tipo-desktop">

                                                    <div class="e-tipo-desktop">
                                                        <p>Tipo do produto: </p>
                                                    </div>

                                                    <!-- Caixa de seleção do tipo novo -->
                                                    <div class="u-tipo-desktop">

                                                        <input type="radio" name="categoria" id="a" value="Masculina"><label for="a">Masculina</label><br>
                                                        <input type="radio" name="categoria" id="b" value="Feminina"><label for="b">Feminina</label><br>
                                                        <input type="radio" name="categoria" id="c" value="Kids"><label for="c">Kids</label><br>

                                                    </div>
                                                    <!-- Fim Caixa de seleção do tipo novo -->

                                                </div>
                                                <!-- Fim Tipo novo -->

                                            </div>
                                            <!-- Fim Conteudo da tipo do produto cadastrado -->

                                            <!-- Conteudo da condição do produto cadastrado -->
                                            <div class="linha5-editar-produtos-desktop">

                                                <!-- Condição novo -->
                                                <div class="col-cond-desktop">

                                                    <div class="e-cond-desktop">
                                                        <p>Condição do produto: </p>
                                                    </div>

                                                    <!-- Caixa de seleção da condição novo -->
                                                    <div class="u-cond-desktop">

                                                        <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                        <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                        <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                    </div>
                                                    <!-- Fim Caixa de seleção da condição novo -->

                                                </div>
                                                <!-- Fim Condição novo -->

                                            </div>
                                            <!-- Fim Conteudo da condição do produto cadastrado -->

                                            <!-- Conteudo da subcategoria do produto cadastrado -->
                                            <div class="linha6-editar-produtos-desktop">

                                                <!-- Subcategoria novo -->
                                                <div class="col-sub-desktop">

                                                    <div class="e-sub-desktop">
                                                        <p>SubCategoria: </p>
                                                    </div>

                                                    <!-- Caixa de seleção da condição novo -->
                                                    <div class="u-sub-desktop">

                                                        <select name="subcategoria" id="">
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

                                                    </div>
                                                    <!-- Fim Caixa de seleção da condição novo -->

                                                </div>
                                                <!-- Fim Subcategoria novo -->

                                            </div>
                                            <!-- Fim Conteudo da subcategoria do produto cadastrado -->

                                            <!-- Botão para  salvar as alterções do produto cadastrado -->
                                            <div class="salvar-alt-prod-desktop">

                                                <div class="btn-slavar-alt-prod-desktop">
                                                    <input type="submit" value="Salvar alterações">
                                                </div>

                                            </div>
                                            <!-- Fim Botão para  salvar as alterções do produto cadastrado -->

                                        </form>
                                    </div>
                                    <!-- Fim do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->
                                    
                                    <!-- Fim de um produto cadastrado -->
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php
                                mysqli_data_seek($resultadoCadProdDesk, 0);

                                while ($itemCadProdDesk = mysqli_fetch_assoc($resultadoCadProdDesk)) : ?>
                                    <?php
                                    $idprodutoDesk = $itemCadProdDesk['idproduto'];
                                    ?>

                                    <!-- Começo de um produto cadastrado ADM -->

                                    <!-- Tabela dos produtos cadastrados -->
                                    <div class="tabela-carrinho-desktop">

                                        <!-- Imagem do produto cadastrado -->
                                        <div class="imagem-tabela-carrinho-desktop">
                                            <a href=""><img src="<?= $itemCadProdDesk['path'] ?>" alt="" height="110px" width="100px"></a>
                                        </div>
                                        <!-- Fim Imagem do produto cadastrado -->

                                        <!-- Preço do produto cadastrado -->
                                        <div class="texto-tabela-carrinho-desktop">

                                            <div class="preco-tabela-carrinho-desktop">
                                                <p> R$ <?= $itemCadProdDesk['valor'] ?></p>
                                            </div>

                                            <div class="desc-tabela-carrinho-desktop">
                                                <p><?= $itemCadProdDesk['nome_prod'] ?></p>
                                            </div>

                                        </div>
                                        <!-- Fim Preço do produto cadastrado -->

                                        <!-- Botão para editar o produto cadastrado -->
                                        <div class="editar-tabela-carrinho-desktop">
                                            <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                        </div>
                                        <!-- Fim Botão para editar o produto cadastrado -->

                                        <!-- Botão para excluir o produto cadastrado -->
                                        <div class="excluir-tabela-cad-desktop">
                                            <?php
                                            echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdDesk['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                            ?>
                                        </div>
                                        <!-- Fim Botão para excluir o produto cadastrado -->

                                    </div>
                                    <!-- Fim Tabela dos produtos cadastrados -->
                                    
                                    <!-- Começo do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->
                                    <div class="container-editar-produto-desktop">
                                        <form action="includes/editaProd.php?id=<?= $itemCadProdDesk['idproduto'] ?>" method="post">

                                            <!-- Título preço -->
                                            <div class="titulo-preco-desktop">
                                                <p>Preço</p>
                                            </div>
                                            <!-- Fim Título preço -->

                                            <!-- Conteudo do preço do produto cadastrado -->
                                            <div class="linha1-editar-produtos-desktop">

                                                <!-- Preço original -->
                                                <div class="col-precoO-desktop">
                                                    <div class="e-precoO-desktop">
                                                        <p>Preço original:</p>
                                                    </div>

                                                    <div class="u-precoO-desktop">
                                                        <p><?= $itemCadProdDesk['valor'] ?></p>
                                                    </div>

                                                </div>
                                                <!-- Fim Preço original -->

                                                <!-- Preço novo -->
                                                <div class="col-precoN-desktop">

                                                    <div class="e-precoN-desktop">
                                                        <p>Novo preço:</p>
                                                    </div>

                                                    <!-- Caixa de texto para o Preço novo -->
                                                    <div class="u-precoN-desktop">
                                                        <input type="text" id="u-precoN-desktop" name="novoPreco">
                                                    </div>
                                                    <!-- Fim Caixa de texto para o Preço novo -->

                                                </div>
                                                <!-- Fim Preço novo -->

                                            </div>
                                            <!-- Fim Conteudo do preço do produto cadastrado -->

                                            <!-- Conteudo do nome simples do produto cadastrado -->
                                            <div class="linha2-editar-produtos-desktop">

                                                <!-- Nome simples novo -->
                                                <div class="col-nomeS-desktop">

                                                    <div class="e-nomeS-desktop">
                                                        <p>Nome simples: </p>
                                                    </div>

                                                    <!-- Caixa de texto para o Nome simples novo -->
                                                    <div class="u-nomeS-desktop">
                                                        <input type="text" id="u-nomesS-desktop" name="novoNome">
                                                    </div>
                                                    <!-- Fim Caixa de texto para o Nome simples novo -->

                                                </div>
                                                <!-- Fim Nome simples novo -->

                                            </div>
                                            <!-- Fim Conteudo do nome simples do produto cadastrado -->

                                            <!-- Conteudo da descrição do produto cadastrado -->
                                            <div class="linha3-editar-produtos-desktop">

                                                <!-- Descrição novo -->
                                                <div class="col-desc-desktop">

                                                    <div class="e-desc-desktop">
                                                        <p>Descrição: </p>
                                                    </div>

                                                    <!-- Caixa de texto para o Nome simples novo -->
                                                    <div class="u-desc-desktop">
                                                        <input type="text" id="u-desc-desktop" name="novaDesc">
                                                    </div>
                                                    <!-- Fim Caixa de texto para o Nome simples novo -->

                                                </div>
                                                <!--Fim Descrição novo -->

                                            </div>
                                            <!-- Fim Conteudo da descrição do produto cadastrado -->

                                            <!-- Conteudo da tipo do produto cadastrado -->
                                            <div class="linha4-editar-produtos-desktop">

                                                <!-- Tipo novo -->
                                                <div class="col-tipo-desktop">

                                                    <div class="e-tipo-desktop">
                                                        <p>Tipo do produto: </p>
                                                    </div>

                                                    <!-- Caixa de seleção do tipo novo -->
                                                    <div class="u-tipo-desktop">

                                                        <input type="radio" name="categoria" id="a" value="Masculina"><label for="a">Masculina</label><br>
                                                        <input type="radio" name="categoria" id="b" value="Feminina"><label for="b">Feminina</label><br>
                                                        <input type="radio" name="categoria" id="c" value="Kids"><label for="c">Kids</label><br>

                                                    </div>
                                                    <!-- Fim Caixa de seleção do tipo novo -->

                                                </div>
                                                <!-- Fim Tipo novo -->

                                            </div>
                                            <!-- Fim Conteudo da tipo do produto cadastrado -->

                                            <!-- Conteudo da condição do produto cadastrado -->
                                            <div class="linha5-editar-produtos-desktop">

                                                <!-- Condição novo -->
                                                <div class="col-cond-desktop">

                                                    <div class="e-cond-desktop">
                                                        <p>Condição do produto: </p>
                                                    </div>

                                                    <!-- Caixa de seleção da condição novo -->
                                                    <div class="u-cond-desktop">

                                                        <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                        <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                        <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                    </div>
                                                    <!-- Fim Caixa de seleção da condição novo -->

                                                </div>
                                                <!-- Fim Condição novo -->
                                                
                                            </div>
                                            <!-- Fim Conteudo da condição do produto cadastrado -->

                                            <!-- Conteudo da subcategoria do produto cadastrado -->
                                            <div class="linha6-editar-produtos-desktop">

                                                <!-- Subcategoria novo -->
                                                <div class="col-sub-desktop">

                                                    <div class="e-sub-desktop">
                                                        <p>SubCategoria: </p>
                                                    </div>

                                                    <!-- Caixa de seleção da condição novo -->
                                                    <div class="u-sub-desktop">

                                                        <select name="subcategoria" id="">

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

                                                    </div>
                                                    <!-- Fim Caixa de seleção da condição novo -->

                                                </div>
                                                <!-- Fim Subcategoria novo -->

                                            </div>
                                            <!-- Fim Conteudo da subcategoria do produto cadastrado -->

                                            <!-- Botão para  salvar as alterções do produto cadastrado -->
                                            <div class="salvar-alt-prod-desktop">

                                                <div class="btn-slavar-alt-prod-desktop">
                                                    <input type="submit" value="Salvar alterações">
                                                </div>

                                            </div>
                                            <!-- Fim Botão para  salvar as alterções do produto cadastrado -->

                                        </form>

                                    </div>
                                    <!-- Fim do editar produto cadastrado (só aparecerá caso o usuário clique no botão de editar produto cadastrado) -->

                                    <!-- Fim de um produto cadastrado ADM -->

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!-- Fim Todo o conteudo dos produtos cadastrados -->


                    </div>
                    <!-- Fim Tabela dos produtos cadastrados -->

                </div>
                <!-- Fim Todo o conteudo da tabela dos produtos cadastrados -->


            </div>
            <!-- Fim Todo o conteudo da tabela para desktop -->
        

    </div>
    <!-- Fim Todo o conteudo da parte para desktop -->

    <?php
    include('includes/footer.php');
    ?>

</body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Seleção de elementos do DOM
    const cardCarrinho = document.querySelector(".card-carrinho");
    const cardDados = document.querySelector(".card-dados");
    const cardCadastrados = document.querySelector(".card-cadastrados");
    const cardEnderecos = document.querySelector(".card-enderecos");
    const conteudoCarrinho = document.getElementById("conteudo-carrinho");
    const conteudoDados = document.getElementById("conteudo-dados");
    const conteudoCarrinhoCadastrados = document.querySelector(".conteudo-carrinho-cadastrados");
    const conteudoEnderecos = document.querySelector(".tudo-conteudo-enderecos");
    const botõesEditar = document.querySelectorAll(".editar-tabela-carrinho");
    const formulários = document.querySelectorAll(".container-editar-produto");
    const chevronCarrinho = document.getElementById("chevron-carrinho");
    const chevronDados = document.getElementById("chevron-dados");
    const chevronCadastrados = document.getElementById("chevron-cadastrados");
    const chevronEnderecos = document.getElementById("chevron-enderecos");

    // Função para remover classes ativas e esconder conteúdos
    function removeActiveClasses() {
        cardCarrinho.classList.remove('active');
        cardDados.classList.remove('active');
        cardCadastrados.classList.remove('active');
        cardEnderecos.classList.remove('active');
        conteudoCarrinho.style.display = "none";
        conteudoDados.style.display = "none";
        conteudoCarrinhoCadastrados.style.display = "none";
        conteudoEnderecos.style.display = "none";
        formulários.forEach(form => {
            form.style.display = "none";
        });
        chevronCarrinho.classList.remove('rotate-down');
        chevronDados.classList.remove('rotate-down');
        chevronCadastrados.classList.remove('rotate-down');
        chevronEnderecos.classList.remove('rotate-down');
    }

    // Evento de clique para a seção "Carrinho"
    cardCarrinho.addEventListener("click", function() {
        if (cardCarrinho.classList.contains('active')) {
            removeActiveClasses();
        } else {
            removeActiveClasses();
            cardCarrinho.classList.add('active');
            chevronCarrinho.classList.add('rotate-down');
            conteudoCarrinho.style.display = "block";
        }
    });

    // Evento de clique para a seção "Dados"
    cardDados.addEventListener("click", function() {
        if (cardDados.classList.contains('active')) {
            removeActiveClasses();
        } else {
            removeActiveClasses();
            cardDados.classList.add('active');
            chevronDados.classList.add('rotate-down');
            conteudoDados.style.display = "block";
        }
    });

    // Evento de clique para a seção "Cadastrados"
    cardCadastrados.addEventListener("click", function() {
        if (cardCadastrados.classList.contains('active')) {
            removeActiveClasses();
        } else {
            removeActiveClasses();
            cardCadastrados.classList.add('active');
            chevronCadastrados.classList.add('rotate-down');
            conteudoCarrinhoCadastrados.style.display = "block";
        }
    });

    // Evento de clique para os botões de edição
    botõesEditar.forEach((botão, index) => {
        botão.addEventListener("click", function(e) {
            e.preventDefault();

            if (formulários[index].style.display === "block") {
                formulários[index].style.display = "none";
            } else {
                formulários.forEach(form => {
                    form.style.display = "none";
                });
                formulários[index].style.display = "block";
            }
        });
    });

    // Evento de clique para a seção "Endereços"
    cardEnderecos.addEventListener("click", function() {
        if (cardEnderecos.classList.contains('active')) {
            removeActiveClasses();
        } else {
            removeActiveClasses();
            cardEnderecos.classList.add('active');
            chevronEnderecos.classList.add('rotate-down');
            conteudoEnderecos.style.display = "block";
        }
    });

});


document.addEventListener("DOMContentLoaded", function() {
    // Seleção de elementos do DOM para a versão desktop
    const cardCarrinhoDesktop = document.querySelector(".card-carrinho-desktop");
    const cardDadosDesktop = document.querySelector(".card-dados-desktop");
    const cardCadastradosDesktop = document.querySelector(".card-cadastrados-desktop");
    const conteudoCarrinhoDesktop = document.getElementById("conteudo-carrinho-desktop");
    const conteudoDadosDesktop = document.getElementById("conteudo-dados-desktop");
    const conteudoCarrinhoCadastradosDesktop = document.querySelector(".conteudo-carrinho-cadastrados-desktop");
    const botõesEditarDesktop = document.querySelectorAll(".editar-tabela-carrinho-desktop");
    const formuláriosDesktop = document.querySelectorAll(".container-editar-produto-desktop");

    const cardEnderecosDesktop = document.querySelector(".card-enderecos-desktop");
    const enderecosDesktop = document.querySelector(".enderecos-desktop");
    const editarEnderecosCadastradosDesktop = document.querySelector(".editar-enderecos-cadastrados-desktop");
    const tabelaEnderecosDesktop = document.querySelector(".tabela-enderecos-desktop");

    // Função para remover classes ativas e esconder conteúdos na versão desktop
    function removeActiveClassesDesktop() {
        cardCarrinhoDesktop.classList.remove('active');
        cardDadosDesktop.classList.remove('active');
        cardCadastradosDesktop.classList.remove('active');
        cardEnderecosDesktop.classList.remove('active');
        conteudoCarrinhoDesktop.style.display = "none";
        conteudoDadosDesktop.style.display = "none";
        conteudoCarrinhoCadastradosDesktop.style.display = "none";
        enderecosDesktop.style.display = "none";
        formuláriosDesktop.forEach(form => {
            form.style.display = "none";
        });
    }

    // Evento de clique para a seção "Carrinho" na versão desktop
    cardCarrinhoDesktop.addEventListener("click", function() {
        if (cardCarrinhoDesktop.classList.contains('active')) {
            removeActiveClassesDesktop();
        } else {
            removeActiveClassesDesktop();
            cardCarrinhoDesktop.classList.add('active');
            conteudoCarrinhoDesktop.style.display = "block";
        }
    });

    // Evento de clique para a seção "Dados" na versão desktop
    cardDadosDesktop.addEventListener("click", function() {
        if (cardDadosDesktop.classList.contains('active')) {
            removeActiveClassesDesktop();
        } else {
            removeActiveClassesDesktop();
            cardDadosDesktop.classList.add('active');
            conteudoDadosDesktop.style.display = "block";
        }
    });

    // Evento de clique para a seção "Cadastrados" na versão desktop
    cardCadastradosDesktop.addEventListener("click", function() {
        if (cardCadastradosDesktop.classList.contains('active')) {
            removeActiveClassesDesktop();
        } else {
            removeActiveClassesDesktop();
            cardCadastradosDesktop.classList.add('active');
            conteudoCarrinhoCadastradosDesktop.style.display = "block";
        }
    });

    // Evento de clique para os botões de edição na versão desktop
    botõesEditarDesktop.forEach((botão, index) => {
        botão.addEventListener("click", function(e) {
            e.preventDefault();

            if (formuláriosDesktop[index].style.display === "block") {
                formuláriosDesktop[index].style.display = "none";
            } else {
                formuláriosDesktop.forEach(form => {
                    form.style.display = "none";
                });
                formuláriosDesktop[index].style.display = "block";
            }
        });

    });

    // Evento de clique para a seção "Endereços" na versão desktop
    cardEnderecosDesktop.addEventListener("click", function() {
        if (cardEnderecosDesktop.classList.contains('active')) {
            removeActiveClassesDesktop();
        } else {
            removeActiveClassesDesktop();
            cardEnderecosDesktop.classList.add('active');
            enderecosDesktop.style.display = "block";
        }
    });

});


    function submitForm() {
        document.getElementById("uploadForm").submit();
    }
</script>
<?php if (isset($_SESSION['erro_perfil'])) : ?>
    <script>
        alert("Tipo de aquivo não aceito");
    </script>
<?php endif;
unset($_SESSION['erro_perfil']);
?>




</body>

</html>