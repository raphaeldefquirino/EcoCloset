    <?php
    session_start();
    include('includes/conexao.php');
    include('includes/verifica-login.php');

    $id_usuario = $_SESSION['id_usuario'];

    $consultaCarrinho = "SELECT * FROM pedidos WHERE idusuario = '$id_usuario' AND status = 'carrinho'";
    $resultadoCarrinho = mysqli_query($conexao, $consultaCarrinho);

    $consultaCadProd= "SELECT * FROM cadastro_prod WHERE id_usu = '$id_usuario'";
    $resultadoCadProd = mysqli_query($conexao, $consultaCadProd);
    $CadProd = mysqli_fetch_assoc($resultadoCadProd);

    $consultaDados = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
    $resultadoDados = mysqli_query($conexao, $consultaDados);
    $dados = mysqli_fetch_assoc($resultadoDados);

    /*-------------------------------DESK----------------------*/ 

    $consultaCarrinhoDesk = "SELECT * FROM pedidos WHERE idusuario = '$id_usuario' AND status = 'carrinho'";
    $resultadoCarrinhoDesk = mysqli_query($conexao, $consultaCarrinhoDesk);

    $consultaCadProdDesk = "SELECT * FROM cadastro_prod WHERE id_usu = '$id_usuario'";
    $resultadoCadProdDesk = mysqli_query($conexao, $consultaCadProdDesk);
    $CadProdDesk = mysqli_fetch_assoc($resultadoCadProdDesk);

    $consultaDadosDesk = "SELECT * FROM cadastro_usuario WHERE idusuario = '$id_usuario'";
    $resultadoDadosDesk = mysqli_query($conexao, $consultaDadosDesk);
    $dadosDesk = mysqli_fetch_assoc($resultadoDadosDesk);

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
        <title>Tabela do usuário</title>
    </head>

    <body>
        <?php
        include('menu.php');
        ?>

<div class="tudo-perfil-usuario">

        <div class="container-perfil-usuario">

            <div class="parte-perfil-usuario">

                <div class="container-imagem-usuario">

                <div class="container-imagem-sair-perfil-usuario">

                    <div class="imagem-perfil-usuario">

                    <img src="<?=$dados['path_user']?>" alt="imagem de usuário" height="200px" width="200px">

                    </div>

                    <div class="sobrepondo-imagem-perfil-usuario">

                        <a href=""><span class="material-symbols-outlined" id="edit-perfil-usuario">edit</span></a>

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

                        <a href="includes/logout.php"> <p>Sair</p> </a>
    
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
                <?php while ($itemCarrinho = mysqli_fetch_assoc($resultadoCarrinho)) : ?>
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
                    <?php endwhile; ?>
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

                        <div class="re-cep">

                            <div class="e-cep">
                                <p>CEP: </p>
                            </div>
                            <div class="u-cep">
                                <p><?= $dados['CEP'] ?></p>
                            </div>

                        </div>

                        <div class="re-endereco">

                            <div class="e-endereco">
                                <p>Endereço: </p>
                            </div>
                            <div class="u-endereco">
                                <p><?= $dados['endereco'] ?></p>
                            </div>

                        </div>
                        <div class="re-complemento">

                            <div class="e-complemento">
                                <p>Complemento: </p>
                            </div>
                            <div class="u-complemento">
                                <p><?= $dados['complemento'] ?></p>
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

            <!-- Começo da parte cadastrados -->
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

                        <?php while ($itemCadProd = mysqli_fetch_assoc($resultadoCadProd)) : ?>
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
                                <form action="includes/editaProd.php?id=<?= $itemCadProd['idproduto']?>" method="post">

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
                                                <input type="text" id="u-precoN" name="novoPreco" >
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
                                                <select name="" id="" name = "subcategoria">
                                                    <option value="Jaqueta">Jaqueta</option>
                                                    <option value="Camisa">Camisa</option>
                                                    <option value="Calça">Calça</option>
                                                    <option value="Vestido">Vestido</option>
                                                    <option value="Shorts">Shorts</option>
                                                    <option value="Calçado">Calçado</option>
                                                    <option value="Acessório">Acessório</option>
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
                    
                        <?php while ($itemCarrinhoDesk = mysqli_fetch_assoc($resultadoCarrinhoDesk)) : ?>
                            <?php
                            $idprodutoDesk = $itemCarrinhoDesk['idproduto'];
                            $consultaProdutoDesk = "SELECT * FROM cadastro_prod WHERE idproduto = '$idprodutoDesk'";
                            $resultadoProdutoDesk = mysqli_query($conexao, $consultaProdutoDesk);
                            $produtoDesk = mysqli_fetch_assoc($resultadoProdutoDesk);
                            ?>

                            <div class="conteudo-total-tabela-carrinho-desktop">

                                <div class="tabela-carrinho-desktop">

                                    <div class="imagem-tabela-carrinho-desktop">
                                        <a href=""><img src="<?= $produtoDesk['path'] ?>" alt="" height="110px" width="100px"></a>
                                    </div>

                                    <div class="texto-tabela-carrinho-desktop">
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
                                    <a href="">
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
                            <div class="re-cep-desktop">

                                <div class="e-cep-desktop">
                                    <p>CEP: </p>
                                </div>
                                <div class="u-cep-desktop">
                                    <p><?= $dadosDesk['CEP'] ?></p>
                                </div>

                            </div>

                            <div class="re-endereco-desktop">

                                <div class="e-endereco-desktop">
                                    <p>Endereço: </p>
                                </div>
                                <div class="u-endereco-desktop">
                                    <p><?= $dadosDesk['endereco'] ?></p>
                                </div>

                            </div>

                            <div class="re-complemento-desktop">

                                <div class="e-complemento-desktop">
                                    <p>Complemento: </p>
                                </div>
                                <div class="u-complemento-desktop">
                                    <p><?= $dadosDesk['complemento'] ?></p>
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

                    <div class="conteudo-cadastrados-desktop" id="conteudo-cadastrados-desktop">

                            <div class="tabela-cadastrados-desktop" id="tabela-cadastrados-desktop">

                                <div class="conteudo-carrinho-cadastrados-desktop">

                                <?php while ($itemCadProdDesk = mysqli_fetch_assoc($resultadoCadProdDesk)) : ?>
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
                                        <form action="includes/editaProd.php?id=<?= $itemCadProdDesk['idproduto']?>" method="post">

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
                                                        <input type="text" id="u-desc-desktop"  name="novaDesc">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="linha4-editar-produtos-desktop">

                                                <div class="col-tipo-desktop">
                                                    <div class="e-tipo-desktop">
                                                        <p>Tipo do produto: </p>
                                                    </div>
                                                    <div class="u-tipo-desktop" >
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
                                                            <option value="Jaqueta">Jaqueta</option>
                                                            <option value="Camisa">Camisa</option>
                                                            <option value="Calça">Calça</option>
                                                            <option value="Vestido">Vestido</option>
                                                            <option value="Shorts">Shorts</option>
                                                            <option value="Calçado">Calçado</option>
                                                            <option value="Acessório">Acessório</option>
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
            const conteudoCarrinho = document.getElementById("conteudo-carrinho");
            const conteudoDados = document.getElementById("conteudo-dados");
            const conteudoCarrinhoCadastrados = document.querySelector(".conteudo-carrinho-cadastrados");
            const botõesEditar = document.querySelectorAll(".editar-tabela-carrinho");
            const formulários = document.querySelectorAll(".container-editar-produto");
            const chevronCarrinho = document.getElementById("chevron-carrinho");
            const chevronDados = document.getElementById("chevron-dados");
            const chevronCadastrados = document.getElementById("chevron-cadastrados");

            function removeActiveClasses() {
                cardCarrinho.classList.remove('active');
                cardDados.classList.remove('active');
                cardCadastrados.classList.remove('active');
                conteudoCarrinho.style.display = "none";
                conteudoDados.style.display = "none";
                conteudoCarrinhoCadastrados.style.display = "none";
                formulários.forEach(form => {
                    form.style.display = "none";
                });
                chevronCarrinho.classList.remove('rotate-down');
                chevronDados.classList.remove('rotate-down');
                chevronCadastrados.classList.remove('rotate-down');
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
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Código para desktop
            const cardCarrinho = document.querySelector(".card-carrinho-desktop");
            const cardDados = document.querySelector(".card-dados-desktop");
            const cardCadastrados = document.querySelector(".card-cadastrados-desktop");
            const conteudoCarrinho = document.getElementById("conteudo-carrinho-desktop");
            const conteudoDados = document.getElementById("conteudo-dados-desktop");
            const conteudoCarrinhoCadastrados = document.querySelector(".conteudo-carrinho-cadastrados-desktop");
            const botõesEditar = document.querySelectorAll(".editar-tabela-carrinho-desktop");
            const formulários = document.querySelectorAll(".container-editar-produto-desktop");

            function removeActiveClasses() {
                cardCarrinho.classList.remove('active');
                cardDados.classList.remove('active');
                cardCadastrados.classList.remove('active');
                conteudoCarrinho.style.display = "none";
                conteudoDados.style.display = "none";
                conteudoCarrinhoCadastrados.style.display = "none";
                formulários.forEach(form => {
                    form.style.display = "none";
                });
            }

            cardCarrinho.addEventListener("click", function() {
                if (cardCarrinho.classList.contains('active')) {
                    removeActiveClasses();
                } else {
                    removeActiveClasses();
                    cardCarrinho.classList.add('active');
                    conteudoCarrinho.style.display = "block";
                }
            });

            cardDados.addEventListener("click", function() {
                if (cardDados.classList.contains('active')) {
                    removeActiveClasses();
                } else {
                    removeActiveClasses();
                    cardDados.classList.add('active');
                    conteudoDados.style.display = "block";
                }
            });

            cardCadastrados.addEventListener("click", function() {
                if (cardCadastrados.classList.contains('active')) {
                    removeActiveClasses();
                } else {
                    removeActiveClasses();
                    cardCadastrados.classList.add('active');
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
        });
    </script>





    </body>

    </html>