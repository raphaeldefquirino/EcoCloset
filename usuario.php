    <?php 
    session_start();
    include ('includes/verifica-login.php');
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/style.css">
        <link rel="stylesheet" href="estilos/media-query.css">
        <title>Tabela deletar</title>

        <?php 
        include("includes/menu.php");
        ?>
        
    </head>
    <body>
        <p><a href="includes/logout.php">Sair</a></p>
        <div class="tabela-usu">
            <table class="table-usu">
                <thead>
                    <tr>
                        <th scope="col">Nome do produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

                include("includes/conexao.php");

                $id_usuario = $_SESSION['id_usuario'];

                $consulta = "SELECT * FROM cadastro_prod WHERE id_usu = '{$id_usuario}'";

                $consultaadm = "SELECT * FROM cadastro_prod";

                $resultado = mysqli_query($conexao, $consulta);

                $resultadoadm = mysqli_query($conexao, $consultaadm);

                if($id_usuario === '3'){

                if(mysqli_num_rows($resultadoadm) > 0){

                    while ($produto = mysqli_fetch_assoc($resultadoadm)){

                        echo '<tr>';
                        echo '<td data-label="Nome do produto">' . $produto['nome_prod'] . '</td>';
                        echo '<td data-label="Descrição">' . $produto['descricao_prod'] . '</td>';
                        echo '<td data-label="Valor">' . $produto['valor'] . '</td>';
                        echo '<td data-label="..."><a href="includes/deletar.php?id=' . $produto['idproduto'] . '" class="deletar">&#10006;</a></td>';
                        echo '</tr>';
                    }
                }

            }

                if(mysqli_num_rows($resultado) > 0){

                    while ($produto = mysqli_fetch_assoc($resultado)){

                        echo '<tr>';
                        echo '<td data-label="Nome do produto">' . $produto['nome_prod'] . '</td>';
                        echo '<td data-label="Descrição">' . $produto['descricao_prod'] . '</td>';
                        echo '<td data-label="Valor">' . $produto['valor'] . '</td>';
                        echo '<td data-label="..."><a href="deletar.php?id=' . $produto['idproduto'] . '" class="deletar">&#10006;</a></td>';
                        echo '</tr>';
                    }

                } else {
                    echo '<tr><td colspan="5">Nenhum produto encontrado.</td></tr>';
                }

                mysqli_close($conexao);
                ?>
                </tbody>
            </table>
        </div>

        <?php 
        include("includes/footer.php");
        ?>
        
    </body>
    </html>
