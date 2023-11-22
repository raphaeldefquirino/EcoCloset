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

    <div class="tudo-perfil-usuario">

        <div class="container-perfil-usuario">

            <div class="parte-perfil-usuario">

                <div class="container-imagem-usuario">

                    <div class="container-imagem-sair-perfil-usuario">

                        <div class="imagem-perfil-usuario">

                            <img src="<?= $dados['path_user'] ?>" alt="imagem de usuário" height="200px" width="200px">

                        </div>

                        <div class="sobrepondo-imagem-perfil-usuario">
                            <form id="uploadForm" action="editaImagemUser.php" method="POST" enctype="multipart/form-data">
                                <input type="file" class="file-upload" name="imagemUser" id="fileInput" onchange="submitForm()">
                                <span class="material-symbols-outlined" id="edit-perfil-usuario">edit</span>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="textos-perfil-usuario">

                    <div class="ola-perfil-usuario">
                        <p>Olá, <?= $dados['nome'] ?></p>
                    </div>

                    <div class="mensagem-perfil-usuario">
                        <p>"Seja a moda sustentável que você quer ver no mundo. Escolha o EcoCloset!"</p>
                    </div>

                    <div class="btn-sair-perfil-usuario">

                        <a href="includes/logout.php">
                            <p>Sair</p>
                        </a>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="tudo">

        <!-- Começo da parte carrinho -->
        <div class="carrinho">
            <div class="card-carrinho" id="card-carrinho">
                <span class="material-symbols-outlined" id="shopping_cart">shopping_cart</span>
                <p>Meu carrinho de compras</p>
                <span class="material-symbols-outlined chevron" id="chevron-carrinho">chevron_right</span>
            </div>

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


                    <div class="carrinho-vazio">
                        <p>O seu carrinho está vazio!</p>
                    </div>


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

                    <div class="conteudo-total-tabela-carrinho">
                        <div class="tabela-carrinho">

                            <div class="imagem-tabela-carrinho">
                                <a href=""><img src="<?= $produto['path'] ?>" alt="" height="110px" width="100px"></a>
                            </div>

                            <div class="texto-tabela-carrinho">
                                <div class="preco-tabela-carrinho">
                                    <p>R$ <?= $produto['valor'] ?></p>
                                </div>
                                <div class="desc-tabela-carrinho">
                                    <p><?= $produto['nome_prod'] ?></p>
                                </div>
                            </div>

                            <div class="excluir-tabela-carrinho">
                                <?php
                                echo '<a href="includes/deletar.php?id= ' . $produto['idproduto'] . '"><span class="material-symbols-outlined" id="delete">delete</span></a>';
                                ?>
                            </div>

                        </div>
                        <div class="confirmar-carrinho">
                            <a href="">
                                <div class="texto-confirmar-carrinho">
                                    <p>Fechar compra</p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php 
                //encerra o loop
                endwhile; ?>
                <!-- Parte do botão de fechar compra -->
                <!-- Fim parte do botão de fechar compra -->
            </div>
        </div>
        <!-- Fim da parte carrinho -->
        <!-- Começo da parte dados -->
        <div class="dados">

            <div class="card-dados" id="card-dados">
                <span class="material-symbols-outlined" id="database">database</span>
                <p>Meus dados</p>
                <span class="material-symbols-outlined chevron" id="chevron-dados">chevron_right</span>
            </div>

            <div class="conteudo-dados" id="conteudo-dados">

                <div class="tabela-dados">

                    <div class="re-nome">

                        <div class="e-nome">
                            <p>Nome: </p>
                        </div>
                        <div class="u-nome">
                            <p><?= $dados['nome'] ?> </p>
                        </div>

                    </div>

                    <div class="re-sobrenome">

                        <div class="e-sobrenome">
                            <p>Sobrenome: </p>
                        </div>
                        <div class="u-sobrenome">
                            <p><?= $dados['sobrenome'] ?></p>
                        </div>

                    </div>

                    <div class="re-email">

                        <div class="e-email">
                            <p>Email: </p>
                        </div>
                        <div class="u-email">
                            <p><?= $dados['email'] ?></p>
                        </div>

                    </div>


                    <div class="re-tel">

                        <div class="e-tel">
                            <p>Telefone/cell: </p>
                        </div>
                        <div class="u-tel">
                            <p><?= $dados['telefone'] ?></p>
                        </div>

                    </div>

                </div>

                <div class="editar-dados">

                    <a href="editaDados.php">
                        <p>Editar seus dados</p>
                    </a>

                </div>

            </div>

        </div>
        <!-- Fim da parte dados -->

        <!-- Começo da parte enderecos -->

        <div class="enderecos">




            <div class="card-enderecos" id="card-enderecos">
                <span class="material-symbols-outlined" id="enderecos">
                    location_on
                </span>
                <p>Endereços</p>
                <span class="material-symbols-outlined chevron" id="chevron-enderecos">chevron_right</span>
            </div>





            <div class="tudo-conteudo-enderecos">


                <div class="adicionar-enderecos">
                    <a href="adicionaEndereco.php">
                        <p>Adicionar um novo endereço</p>
                    </a>
                </div>
                <?php if (mysqli_num_rows($resultadoEnd) == 0) {
                    $_SESSION['end-vazio'] = true;
                }
                ?>

                <?php
                //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                if (isset($_SESSION['end-vazio'])) :

                ?>


                    <div class="carrinho-vazio">
                        <p>Você não tem endereços cadastrados!</p>
                    </div>


                <?php
                endif;
                unset($_SESSION['end-vazio']);
                ?>

                <!-- Uma parte dos enderecos -->
                <?php
                mysqli_data_seek($resultadoEnd, 0);
                while ($endereco = mysqli_fetch_assoc($resultadoEnd)) :
                ?>

                    <div class="tabela-carrinho">

                        <div class="nome-enderecos-cadastrados">
                            <p><?= $endereco['nome_end'] ?></p>
                        </div>



                        <div class="editar-tabela-carrinho">
                            <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                        </div>

                        <div class="excluir-tabela-cad">
                        <?php echo '<a href="includes/deletaEndereco.php?id=' . $endereco['idendereco'] .  '">' ?><span class="material-symbols-outlined" id="delete-cad">delete</span></a></a>
                        </div>

                    </div>


                    <!-- Começo do editar cadastrados -->

                    <div class="container-editar-produto">



                        <form action="includes/editaEnderecoBanco.php?id=<?php echo $id_usuario ?>" method="post">


                            <div class="conteudo-re-enderecos">

                                <div class="re-enderecos">

                                    <div class="e-enderecos">
                                        <p>Nome do endereço: </p>
                                    </div>
                                    <div class="u-enderecos">
                                        <p><?= $endereco['nome_end'] ?></p>
                                    </div>

                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="u-nomesS" placeholder="Digite o novo nome" name="nome">
                                </div>

                            </div>

                            <div class="conteudo-re-cep-enderecos">

                                <div class="re-cep-enderecos">

                                    <div class="e-cep-enderecos">
                                        <p>CEP: </p>
                                    </div>
                                    <div class="u-cep-enderecos">
                                        <p><?= $endereco['cep'] ?></p>
                                    </div>

                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo CEP" name="cep">
                                </div>

                            </div>

                            <div class="conteudo-re-cidade">
                                <div class="re-cidade">

                                    <div class="e-cidade">
                                        <p>Cidade: </p>
                                    </div>
                                    <div class="u-cidade">
                                        <p><?= $endereco['cidade'] ?></p>
                                    </div>

                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite a nova cidade" name="cidade">
                                </div>

                            </div>

                            <div class="conteudo-re-bairro">
                                <div class="re-bairro">

                                    <div class="e-bairro">
                                        <p>Bairro: </p>
                                    </div>
                                    <div class="u-bairro">
                                        <p><?= $endereco['bairro'] ?></p>
                                    </div>

                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo bairro" name="bairro">
                                </div>

                            </div>

                            <div class="conteudo-re-rua">
                                <div class="re-rua">

                                    <div class="e-rua">
                                        <p>Rua: </p>
                                    </div>
                                    <div class="u-rua">
                                        <p><?= $endereco['rua'] ?></p>
                                    </div>

                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite a nova rua" name="rua">
                                </div>

                            </div>

                            <div class="conteudo-re-numero">
                                <div class="re-numero">

                                    <div class="e-numero">
                                        <p>Número: </p>
                                    </div>
                                    <div class="u-numero">
                                        <p><?= $endereco['numero'] ?></p>
                                    </div>
                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo número" name="numero">
                                </div>

                            </div>

                            <div class="conteudo-complemento-enderecos">
                                <div class="re-complemento-enderecos">

                                    <div class="e-complemento-enderecos">
                                        <p>Complemento: </p>
                                    </div>
                                    <div class="u-complemento-enderecos">
                                        <p><?= $endereco['complemento'] ?></p>
                                    </div>

                                </div>

                                <div class="caixa-conteudo-re-enderecos">
                                    <input type="text" id="caixa-conteudo-re-enderecos" placeholder="Digite o novo complemento" name="complemento">
                                </div>

                            </div>

                            <div class="salvar-alt-prod">
                                <div class="btn-slavar-alt-prod">
                                    <input type="submit" value="Salvar alterações">
                                </div>
                            </div>
                        </form>







                    </div>

                <?php
                endwhile;
                ?>

                <!-- Fim / Fim de Uma parte dos enderecos -->
            </div>
        </div>

        <!-- Fim da parte enderecos -->

        <!-- Começo da parte cadastrados -->
        <div class="cadastrados">
            <div class="card-cadastrados" id="card-cadastrados">
                <span class="material-symbols-outlined" id="bookmark_manager">bookmark_manager</span>
                <p>Produtos cadastrados</p>
                <span class="material-symbols-outlined chevron" id="chevron-cadastrados">chevron_right</span>
            </div>

            <!-- Tabela de produtos cadastrados -->

            <!-- Começo de um produto cadastrado -->

            <div class="conteudo-cadastrados" id="conteudo-cadastrados">

                <div class="tabela-cadastrados" id="tabela-cadastrados">

                    <div class="conteudo-carrinho-cadastrados">
                        <?php if ($id_usuario == 3) : ?>

                            <?php
                            mysqli_data_seek($resultadoCadProdAdm, 0);
                            while ($itemCadProdAdm = mysqli_fetch_assoc($resultadoCadProdAdm)) : ?>
                                <?php
                                $idproduto = $itemCadProdAdm['idproduto'];
                                ?>

                                <div class="tabela-carrinho">

                                    <div class="imagem-tabela-carrinho">
                                        <a href=""><img src="<?= $itemCadProdAdm['path'] ?>" alt="" height="110px" width="100px"></a>
                                    </div>

                                    <div class="texto-tabela-carrinho">
                                        <div class="preco-tabela-carrinho">
                                            <p>R$ <?= $itemCadProdAdm['valor'] ?></p>
                                        </div>
                                        <div class="desc-tabela-carrinho">
                                            <p><?= $itemCadProdAdm['nome_prod'] ?></p>
                                        </div>
                                    </div>

                                    <div class="editar-tabela-carrinho">
                                        <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                    </div>

                                    <div class="excluir-tabela-cad">
                                        <?php
                                        echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdAdm['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                        ?>
                                    </div>

                                </div>

                                <!-- Começo do editar cadastrados -->

                                <div class="container-editar-produto">
                                    <form action="includes/editaProd.php?id=<?= $itemCadProdAdm['idproduto'] ?>" method="post">

                                        <div class="titulo-preco">
                                            <p>Preço</p>
                                        </div>

                                        <div class="linha1-editar-produtos">

                                            <div class="col-precoO">
                                                <div class="e-precoO">
                                                    <p>Preço original:</p>
                                                </div>
                                                <div class="u-precoO">
                                                    <p><?= $itemCadProdAdm['valor'] ?></p>
                                                </div>
                                            </div>

                                            <div class="col-precoN">
                                                <div class="e-precoN">
                                                    <p>Novo preço:</p>
                                                </div>
                                                <div class="u-precoN">
                                                    <input type="text" id="u-precoN" name="novoPreco">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="linha2-editar-produtos">

                                            <div class="col-nomeS">
                                                <div class="e-nomeS">
                                                    <p>Nome simples: </p>
                                                </div>
                                                <div class="u-nomeS">
                                                    <input type="text" id="u-nomesS" name="novoNome">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="linha3-editar-produtos">

                                            <div class="col-desc">
                                                <div class="e-desc">
                                                    <p>Descrição: </p>
                                                </div>
                                                <div class="u-desc">
                                                    <input type="text" id="u-desc" name="novaDesc">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="linha4-editar-produtos">

                                            <div class="col-tipo">
                                                <div class="e-tipo">
                                                    <p>Tipo do produto: </p>
                                                </div>
                                                <div class="u-tipo">

                                                    <input type="radio" id="a" name="categoria" value="Masculina"><label for="a">Masculina</label><br>
                                                    <input type="radio" id="b" name="categoria" value="Feminina"><label for="b">Feminino</label><br>
                                                    <input type="radio" id="c" name="categoria" value="Kids"><label for="c">Kids</label><br>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="linha5-editar-produtos">

                                            <div class="col-cond">
                                                <div class="e-cond">
                                                    <p>Condição do produto: </p>
                                                </div>
                                                <div class="u-cond">

                                                    <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                    <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                    <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="linha6-editar-produtos-">

                                            <div class="col-sub">
                                                <div class="e-sub">
                                                    <p>SubCategoria: </p>
                                                </div>
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
                                            </div>
                                        </div>

                                        <div class="salvar-alt-prod">
                                            <div class="btn-slavar-alt-prod">
                                                <input type="submit" value="Salvar alterações">
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <!-- Fim de um produto cadastrado -->

                                <!-- Começo de um produto cadastrado -->

                            <?php endwhile; ?>

                        <?php else : ?>

                            <?php
                            mysqli_data_seek($resultadoCadProd, 0);
                            while ($itemCadProd = mysqli_fetch_assoc($resultadoCadProd)) : ?>
                                <?php
                                $idproduto = $itemCadProd['idproduto'];
                                ?>

                                <div class="tabela-carrinho">

                                    <div class="imagem-tabela-carrinho">
                                        <a href=""><img src="<?= $itemCadProd['path'] ?>" alt="" height="110px" width="100px"></a>
                                    </div>

                                    <div class="texto-tabela-carrinho">
                                        <div class="preco-tabela-carrinho">
                                            <p>R$ <?= $itemCadProd['valor'] ?></p>
                                        </div>
                                        <div class="desc-tabela-carrinho">
                                            <p><?= $itemCadProd['nome_prod'] ?></p>
                                        </div>
                                    </div>

                                    <div class="editar-tabela-carrinho">
                                        <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                    </div>

                                    <div class="excluir-tabela-cad">
                                        <?php
                                        echo '<a href="includes/deletaProd.php?id= ' . $itemCadProd['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                        ?>
                                    </div>

                                </div>

                                <!-- Começo do editar cadastrados -->

                                <div class="container-editar-produto">
                                    <form action="includes/editaProd.php?id=<?= $itemCadProd['idproduto'] ?>" method="post">

                                        <div class="titulo-preco">
                                            <p>Preço</p>
                                        </div>

                                        <div class="linha1-editar-produtos">

                                            <div class="col-precoO">
                                                <div class="e-precoO">
                                                    <p>Preço original:</p>
                                                </div>
                                                <div class="u-precoO">
                                                    <p><?= $itemCadProd['valor'] ?></p>
                                                </div>
                                            </div>

                                            <div class="col-precoN">
                                                <div class="e-precoN">
                                                    <p>Novo preço:</p>
                                                </div>
                                                <div class="u-precoN">
                                                    <input type="text" id="u-precoN" name="novoPreco">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="linha2-editar-produtos">

                                            <div class="col-nomeS">
                                                <div class="e-nomeS">
                                                    <p>Nome simples: </p>
                                                </div>
                                                <div class="u-nomeS">
                                                    <input type="text" id="u-nomesS" name="novoNome">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="linha3-editar-produtos">

                                            <div class="col-desc">
                                                <div class="e-desc">
                                                    <p>Descrição: </p>
                                                </div>
                                                <div class="u-desc">
                                                    <input type="text" id="u-desc" name="novaDesc">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="linha4-editar-produtos">

                                            <div class="col-tipo">
                                                <div class="e-tipo">
                                                    <p>Tipo do produto: </p>
                                                </div>
                                                <div class="u-tipo">

                                                    <input type="radio" id="a" name="categoria" value="Masculina"><label for="a">Masculina</label><br>
                                                    <input type="radio" id="b" name="categoria" value="Feminina"><label for="b">Feminino</label><br>
                                                    <input type="radio" id="c" name="categoria" value="Kids"><label for="c">Kids</label><br>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="linha5-editar-produtos">

                                            <div class="col-cond">
                                                <div class="e-cond">
                                                    <p>Condição do produto: </p>
                                                </div>
                                                <div class="u-cond">

                                                    <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                    <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                    <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="linha6-editar-produtos-">

                                            <div class="col-sub">
                                                <div class="e-sub">
                                                    <p>SubCategoria: </p>
                                                </div>
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
                                            </div>
                                        </div>

                                        <div class="salvar-alt-prod">
                                            <div class="btn-slavar-alt-prod">
                                                <input type="submit" value="Salvar alterações">
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <!-- Fim de um produto cadastrado -->

                                <!-- Começo de um produto cadastrado -->

                            <?php endwhile; ?>
                        <?php endif; ?>
                        <!-- Fim de um produto cadastrado -->

                    </div>

                </div>

            </div>
            <!-- Fim de produtos cadastrados -->

            <!-- Fim da parte cadastrados -->

        </div>

    </div>

    <div class="tudo-tudo-desktop">
        <div class="tudo-card-desktop">

            <div class="card-desktop">

                <div class="card-carrinho-desktop">

                    <div class="card-carrinho-desktop" id="card-carrinho-desktop">
                        <span class="material-symbols-outlined" id="shopping_cart">shopping_cart</span>
                        <p>Meu carrinho de compras</p>
                        <span class="material-symbols-outlined chevron" id="chevron-carrinho">chevron_right</span>
                    </div>

                </div>

            </div>

            <div class="card-dados-desktop">

                <div class="card-dados-desktop" id="card-dados-desktop">
                    <span class="material-symbols-outlined" id="database">database</span>
                    <p>Meus dados</p>
                    <span class="material-symbols-outlined chevron" id="chevron-dados">chevron_right</span>
                </div>

            </div>

            <div class="card-enderecos-desktop">

                <div class="card-enderecos-desktop" id="card-enderecos-desktop">
                    <span class="material-symbols-outlined" id="enderecos">
                        location_on
                    </span>
                    <p>Endereços</p>
                    <span class="material-symbols-outlined chevron" id="chevron-enderecos-desktop">chevron_right</span>
                </div>

            </div>

            <div class="card-cadastrados-desktop">

                <div class="card-cadastrados-desktop" id="card-cadastrados-desktop">
                    <span class="material-symbols-outlined" id="bookmark_manager">bookmark_manager</span>
                    <p>Produtos cadastrados</p>
                    <span class="material-symbols-outlined chevron" id="chevron-cadastrados">chevron_right</span>
                </div>

            </div>

        </div>

        <!-- Fim do card -->

        <div class="TESTE">

            <div class="tabelas-desktop">

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


                        <div class="cadastrados-vazio-desktop" id="carrinho-vazio-cadastrados-desktop">
                            <p>O seu carrinho está vazio!</p>
                        </div>


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

                        <div class="conteudo-total-tabela-carrinho-desktop">

                            <div class="tabela-carrinho-desktop">



                                <div class="imagem-tabela-carrinho-desktop">
                                    <?php echo '<a href="">' ?><img src="<?= $produtoDesk['path'] ?>" alt="" height="110px" width="100px"></a>
                                </div>

                                <div class="texto-tabela-carrinho-desktop" id="primeiro-card">
                                    <div class="preco-tabela-carrinho-desktop">
                                        <p>R$ <?= $produtoDesk['valor'] ?></p>
                                    </div>
                                    <div class="desc-tabela-carrinho-desktop">
                                        <p><?= $produtoDesk['nome_prod'] ?></p>
                                    </div>
                                </div>

                                <div class="excluir-tabela-carrinho-desktop">
                                    <?php
                                    echo '<a href="includes/deletar.php?id= ' . $produtoDesk['idproduto'] . '"><span class="material-symbols-outlined" id="delete">delete</span></a>';
                                    ?>
                                </div>

                            </div>
                            <div class="confirmar-carrinho-desktop">
                                <?php echo '<a href="finalizar-compra.php?id= ' . $produtoDesk['idproduto'] . '">';
                                ?>
                                <div class="texto-confirmar-carrinho-desktop">
                                    <p>Fechar compra</p>
                                </div>
                                </a>
                            </div>
                        </div>


                    <?php endwhile; ?>
                    <!-- Parte do botão de fechar compra -->

                    <!-- Fim parte do botão de fechar compra -->

                </div>

                <!-- Fim carrinho -->

                <?php
                $consultaDadosDesk = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
                $resultadoDadosDesk = mysqli_query($conexao, $consultaDadosDesk);
                $dadosDesk = mysqli_fetch_assoc($resultadoDadosDesk);
                ?>

                <div class="conteudo-dados-desktop" id="conteudo-dados-desktop">

                    <div class="tabela-dados-desktop">

                        <div class="re-nome-desktop">

                            <div class="e-nome-desktop">
                                <p>Nome: </p>
                            </div>
                            <div class="u-nome-desktop">
                                <p><?= $dadosDesk['nome'] ?> </p>
                            </div>
                        </div>

                        <div class="re-sobrenome-desktop">

                            <div class="e-sobrenome-desktop">
                                <p>Sobrenome: </p>
                            </div>
                            <div class="u-sobrenome-desktop">
                                <p><?= $dadosDesk['sobrenome'] ?></p>
                            </div>
                        </div>

                        <div class="re-email-desktop">

                            <div class="e-email-desktop">
                                <p>Email: </p>
                            </div>
                            <div class="u-email-desktop">
                                <p><?= $dadosDesk['email'] ?></p>
                            </div>

                        </div>

                        <div class="re-tel-desktop">

                            <div class="e-tel-desktop">
                                <p>Telefone/cell: </p>
                            </div>
                            <div class="u-tel-desktop">
                                <p><?= $dadosDesk['telefone'] ?></p>
                            </div>

                        </div>

                    </div>

                    <div class="espaco-editar-dados-desktop">
                        <div class="editar-dados-desktop">

                            <a href="editaDados.php">
                                <p>Editar seus dados</p>
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Fim dados -->

                <!-- Começo da parte enderecos desktop -->

                <div class="enderecos-desktop">







                    <div class="adicionar-enderecos-desktop">
                        <a href="adicionaEndereco.php">
                            <p>Adicionar um novo endereço</p>
                        </a>
                    </div>




                    <!-- Uma parte dos enderecos -->

                    <?php if (mysqli_num_rows($resultadoEndDesk) == 0) {
                        $_SESSION['end-vazioDesk'] = true;
                    }
                    ?>

                    <?php
                    //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                    if (isset($_SESSION['end-vazioDesk'])) :

                    ?>


                        <div class="carrinho-vazio">
                            <p>Você não tem endereços cadastrados!</p>
                        </div>


                    <?php
                    endif;
                    unset($_SESSION['end-vazioDesk']);
                    ?>


                    <div class="conteudo-re-cep-enderecos-desktop">

                        <?php
                        mysqli_data_seek($resultadoEndDesk, 0);
                        while ($enderecoDesk = mysqli_fetch_assoc($resultadoEndDesk)) :
                        ?>

                            <div class="tabela-carrinho-desktop" id="tabela-carrinho-desktop-ENDERECO">

                                <div class="nome-enderecos-cadastrados-desktop">
                                    <p><?= $enderecoDesk['nome_end'] ?></p>
                                </div>

                                <div class="editar-tabela-carrinho-desktop">
                                    <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                </div>

                                <div class="excluir-tabela-cad-desktop">
                                    <?php echo '<a href="includes/deletaEndereco.php?id=' . $enderecoDesk['idendereco'] .  '">' ?><span class="material-symbols-outlined" id="delete-cad">delete</span></a>
                                </div>

                            </div>


                            <!-- Começo do editar cadastrados -->

                            <div class="container-editar-produto-desktop">






                                <div class="conteudo-re-enderecos-desktop">
                                    <form action="includes/editaEnderecoBanco.php?id=<?php echo $id_usuario ?>" method="post">

                                        <div class="re-enderecos-desktop">

                                            <div class="e-enderecos-desktop">
                                                <p>Nome do endereço: </p>
                                            </div>
                                            <div class="u-enderecos-desktop">
                                                <p><?= $enderecoDesk['nome_end'] ?></p>
                                            </div>

                                        </div>

                                        <div class="caixa-conteudo-re-enderecos-desktop">
                                            <input type="text" id="u-nomesS" placeholder="Digite o novo nome" name="nome">
                                        </div>

                                </div>

                                <div class="conteudo-re-cep-enderecos-desktop">

                                    <div class="re-cep-enderecos-desktop">

                                        <div class="e-cep-enderecos-desktop">
                                            <p>CEP: </p>
                                        </div>
                                        <div class="u-cep-enderecos-desktop">
                                            <p><?= $enderecoDesk['cep'] ?></p>
                                        </div>

                                    </div>

                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo CEP" name="cep">
                                    </div>

                                </div>

                                <div class="conteudo-re-cidade-desktop">
                                    <div class="re-cidade-desktop">

                                        <div class="e-cidade-desktop">
                                            <p>Cidade: </p>
                                        </div>
                                        <div class="u-cidade-desktop">
                                            <p><?= $enderecoDesk['cidade'] ?></p>
                                        </div>

                                    </div>

                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite a nova cidade" name="cidade">
                                    </div>

                                </div>

                                <div class="conteudo-re-bairro-desktop">
                                    <div class="re-bairro-desktop">

                                        <div class="e-bairro-desktop">
                                            <p>Bairro: </p>
                                        </div>
                                        <div class="u-bairro-desktop">
                                            <p><?= $enderecoDesk['bairro'] ?></p>
                                        </div>

                                    </div>

                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo bairro" name="bairro">
                                    </div>

                                </div>

                                <div class="conteudo-re-rua-desktop">
                                    <div class="re-rua-desktop">

                                        <div class="e-rua-desktop">
                                            <p>Rua: </p>
                                        </div>
                                        <div class="u-rua-desktop">
                                            <p>
                                                <?= $enderecoDesk['rua'] ?></p>
                                        </div>

                                    </div>

                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite a nova rua" name="rua">
                                    </div>

                                </div>

                                <div class="conteudo-re-numero-desktop">
                                    <div class="re-numero-desktop">

                                        <div class="e-numero-desktop">
                                            <p>Número: </p>
                                        </div>
                                        <div class="u-numero-desktop">
                                            <p><?= $enderecoDesk['numero'] ?></p>
                                        </div>
                                    </div>

                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo número" name="numero">
                                    </div>

                                </div>

                                <div class="conteudo-complemento-enderecos-desktop">
                                    <div class="re-complemento-enderecos-desktop">

                                        <div class="e-complemento-enderecos-desktop">
                                            <p>Complemento: </p>
                                        </div>
                                        <div class="u-complemento-enderecos-desktop">
                                            <p><?= $enderecoDesk['complemento'] ?></p>
                                        </div>

                                    </div>

                                    <div class="caixa-conteudo-re-enderecos-desktop">
                                        <input type="text" id="caixa-conteudo-re-enderecos-desktop" placeholder="Digite o novo complemento" name="complemento">
                                    </div>

                                </div>

                                <div class="salvar-alt-prod">
                                    <div class="btn-slavar-alt-prod">
                                        <input type="submit" value="Salvar alterações">
                                    </div>
                                </div>
                                </form>





                                </div>
                            <?php
                            endwhile
                            ?>


                            



                    </div>


                    <!-- Fim/fim de Uma parte dos enderecos -->






                </div>

                <!-- Fim da parte enderecos desktop -->










                <div class="conteudo-cadastrados-desktop" id="conteudo-cadastrados-desktop">

                    <div class="tabela-cadastrados-desktop" id="tabela-cadastrados-desktop">

                        <div class="conteudo-carrinho-cadastrados-desktop">

                            <?php if (mysqli_num_rows($resultadoCadProdDesk) == 0) {
                                $_SESSION['carrinho-vazio'] = true;
                            }
                            ?>

                            <?php
                            //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                            if (isset($_SESSION['carrinho-vazio'])) :

                            ?>


                                <div class="carrinho-vazio-desktop">
                                    <p>Você ainda não cadastrou nenhum produto.</p>
                                </div>


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
                                    <!-- Começo de um produto cadastrado -->
                                    <div class="tabela-carrinho-desktop">

                                        <div class="imagem-tabela-carrinho-desktop">
                                            <a href=""><img src="<?= $itemCadProdDeskAdm['path'] ?>" alt="" height="110px" width="100px"></a>
                                        </div>

                                        <div class="texto-tabela-carrinho-desktop">
                                            <div class="preco-tabela-carrinho-desktop">
                                                <p> R$ <?= $itemCadProdDeskAdm['valor'] ?></p>
                                            </div>
                                            <div class="desc-tabela-carrinho-desktop">
                                                <p><?= $itemCadProdDeskAdm['nome_prod'] ?></p>
                                            </div>
                                        </div>

                                        <div class="editar-tabela-carrinho-desktop">
                                            <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                        </div>

                                        <div class="excluir-tabela-cad-desktop">
                                            <?php
                                            echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdDeskAdm['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                            ?>
                                        </div>

                                    </div>
                                    <!-- Começo do editar cadastrados -->

                                    <div class="container-editar-produto-desktop">
                                        <form action="includes/editaProd.php?id=<?= $itemCadProdDeskAdm['idproduto'] ?>" method="post">

                                            <div class="titulo-preco-desktop">
                                                <p>Preço</p>
                                            </div>

                                            <div class="linha1-editar-produtos-desktop">

                                                <div class="col-precoO-desktop">
                                                    <div class="e-precoO-desktop">
                                                        <p>Preço original:</p>
                                                    </div>
                                                    <div class="u-precoO-desktop">
                                                        <p><?= $itemCadProdDeskAdm['valor'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-precoN-desktop">
                                                    <div class="e-precoN-desktop">
                                                        <p>Novo preço:</p>
                                                    </div>
                                                    <div class="u-precoN-desktop">
                                                        <input type="text" id="u-precoN-desktop" name="novoPreco">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="linha2-editar-produtos-desktop">

                                                <div class="col-nomeS-desktop">
                                                    <div class="e-nomeS-desktop">
                                                        <p>Nome simples: </p>
                                                    </div>
                                                    <div class="u-nomeS-desktop">
                                                        <input type="text" id="u-nomesS-desktop" name="novoNome">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha3-editar-produtos-desktop">

                                                <div class="col-desc-desktop">
                                                    <div class="e-desc-desktop">
                                                        <p>Descrição: </p>
                                                    </div>
                                                    <div class="u-desc-desktop">
                                                        <input type="text" id="u-desc-desktop" name="novaDesc">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha4-editar-produtos-desktop">

                                                <div class="col-tipo-desktop">
                                                    <div class="e-tipo-desktop">
                                                        <p>Tipo do produto: </p>
                                                    </div>
                                                    <div class="u-tipo-desktop">
                                                        <input type="radio" name="categoria" id="a" value="Masculina"><label for="a">Masculina</label><br>
                                                        <input type="radio" name="categoria" id="b" value="Feminina"><label for="b">Feminina</label><br>
                                                        <input type="radio" name="categoria" id="c" value="Kids"><label for="c">Kids</label><br>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha5-editar-produtos-desktop">

                                                <div class="col-cond-desktop">
                                                    <div class="e-cond-desktop">
                                                        <p>Condição do produto: </p>
                                                    </div>
                                                    <div class="u-cond-desktop">

                                                        <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                        <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                        <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="linha6-editar-produtos-desktop">

                                                <div class="col-sub-desktop">
                                                    <div class="e-sub-desktop">
                                                        <p>SubCategoria: </p>
                                                    </div>
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
                                                </div>
                                            </div>
                                            <div class="salvar-alt-prod-desktop">
                                                <div class="btn-slavar-alt-prod-desktop">
                                                    <input type="submit" value="Salvar alterações">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- Fim do editar cadastrados -->
                                    <!-- Fim de um produto cadastrado -->
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php
                                mysqli_data_seek($resultadoCadProdDesk, 0);

                                while ($itemCadProdDesk = mysqli_fetch_assoc($resultadoCadProdDesk)) : ?>
                                    <?php
                                    $idprodutoDesk = $itemCadProdDesk['idproduto'];
                                    ?>
                                    <!-- Começo de um produto cadastrado -->
                                    <div class="tabela-carrinho-desktop">

                                        <div class="imagem-tabela-carrinho-desktop">
                                            <a href=""><img src="<?= $itemCadProdDesk['path'] ?>" alt="" height="110px" width="100px"></a>
                                        </div>

                                        <div class="texto-tabela-carrinho-desktop">
                                            <div class="preco-tabela-carrinho-desktop">
                                                <p> R$ <?= $itemCadProdDesk['valor'] ?></p>
                                            </div>
                                            <div class="desc-tabela-carrinho-desktop">
                                                <p><?= $itemCadProdDesk['nome_prod'] ?></p>
                                            </div>
                                        </div>

                                        <div class="editar-tabela-carrinho-desktop">
                                            <a href=""><span class="material-symbols-outlined" id="edit">edit</span></a>
                                        </div>

                                        <div class="excluir-tabela-cad-desktop">
                                            <?php
                                            echo '<a href="includes/deletaProd.php?id= ' . $itemCadProdDesk['idproduto'] . '"><span class="material-symbols-outlined" id="delete-cad">delete</span></a>';
                                            ?>
                                        </div>

                                    </div>
                                    <!-- Começo do editar cadastrados -->

                                    <div class="container-editar-produto-desktop">
                                        <form action="includes/editaProd.php?id=<?= $itemCadProdDesk['idproduto'] ?>" method="post">

                                            <div class="titulo-preco-desktop">
                                                <p>Preço</p>
                                            </div>

                                            <div class="linha1-editar-produtos-desktop">

                                                <div class="col-precoO-desktop">
                                                    <div class="e-precoO-desktop">
                                                        <p>Preço original:</p>
                                                    </div>
                                                    <div class="u-precoO-desktop">
                                                        <p><?= $itemCadProdDesk['valor'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-precoN-desktop">
                                                    <div class="e-precoN-desktop">
                                                        <p>Novo preço:</p>
                                                    </div>
                                                    <div class="u-precoN-desktop">
                                                        <input type="text" id="u-precoN-desktop" name="novoPreco">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="linha2-editar-produtos-desktop">

                                                <div class="col-nomeS-desktop">
                                                    <div class="e-nomeS-desktop">
                                                        <p>Nome simples: </p>
                                                    </div>
                                                    <div class="u-nomeS-desktop">
                                                        <input type="text" id="u-nomesS-desktop" name="novoNome">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha3-editar-produtos-desktop">

                                                <div class="col-desc-desktop">
                                                    <div class="e-desc-desktop">
                                                        <p>Descrição: </p>
                                                    </div>
                                                    <div class="u-desc-desktop">
                                                        <input type="text" id="u-desc-desktop" name="novaDesc">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha4-editar-produtos-desktop">

                                                <div class="col-tipo-desktop">
                                                    <div class="e-tipo-desktop">
                                                        <p>Tipo do produto: </p>
                                                    </div>
                                                    <div class="u-tipo-desktop">
                                                        <input type="radio" name="categoria" id="a" value="Masculina"><label for="a">Masculina</label><br>
                                                        <input type="radio" name="categoria" id="b" value="Feminina"><label for="b">Feminina</label><br>
                                                        <input type="radio" name="categoria" id="c" value="Kids"><label for="c">Kids</label><br>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha5-editar-produtos-desktop">

                                                <div class="col-cond-desktop">
                                                    <div class="e-cond-desktop">
                                                        <p>Condição do produto: </p>
                                                    </div>
                                                    <div class="u-cond-desktop">

                                                        <input type="radio" name="condicao" id="d" value="Usado"><label for="d">Usado</label><br>
                                                        <input type="radio" name="condicao" id="e" value="Pouco usado"><label for="e">Pouco usado</label><br>
                                                        <input type="radio" name="condicao" id="f" value="Novo"><label for="f">Novo</label><br>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="linha6-editar-produtos-desktop">

                                                <div class="col-sub-desktop">
                                                    <div class="e-sub-desktop">
                                                        <p>SubCategoria: </p>
                                                    </div>
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
                                                </div>
                                            </div>
                                            <div class="salvar-alt-prod-desktop">
                                                <div class="btn-slavar-alt-prod-desktop">
                                                    <input type="submit" value="Salvar alterações">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- Fim do editar cadastrados -->
                                    <!-- Fim de um produto cadastrado -->
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>


                    </div>

                </div>


            </div>
        </div>

    </div>

    <?php
    include('includes/footer.php');
    ?>

</body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Código para dispositivos móveis
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
        // Código para desktop
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

        cardCarrinhoDesktop.addEventListener("click", function() {
            if (cardCarrinhoDesktop.classList.contains('active')) {
                removeActiveClassesDesktop();
            } else {
                removeActiveClassesDesktop();
                cardCarrinhoDesktop.classList.add('active');
                conteudoCarrinhoDesktop.style.display = "block";
            }
        });

        cardDadosDesktop.addEventListener("click", function() {
            if (cardDadosDesktop.classList.contains('active')) {
                removeActiveClassesDesktop();
            } else {
                removeActiveClassesDesktop();
                cardDadosDesktop.classList.add('active');
                conteudoDadosDesktop.style.display = "block";
            }
        });

        cardCadastradosDesktop.addEventListener("click", function() {
            if (cardCadastradosDesktop.classList.contains('active')) {
                removeActiveClassesDesktop();
            } else {
                removeActiveClassesDesktop();
                cardCadastradosDesktop.classList.add('active');
                conteudoCarrinhoCadastradosDesktop.style.display = "block";
            }
        });

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