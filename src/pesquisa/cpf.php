<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<?php
include('../login/config.php');
//include('../login/local.php');
include('../login/verifica_login.php');
include('../login/redirect.php');

// Recuperamos a ação enviada pelo formulário
$a = $_GET['a'];

// Verificamos se a ação é de busca
if ($a == "buscar") {

    // Pegamos a palavra
    $cpf = trim($_POST['cpf']);
    // Verificamos no banco de dados produtos equivalente a palavra digitada

    //Primeiro retira os espaços do começo e do final.
    //Substitui o ponto por nada
    $cpf = str_replace(".", "", $cpf);
    //Troca o traço por nada
    $cpf = str_replace("-", "", $cpf);
    //Troca o espaço por nada
    $cpf = str_replace(" ", "", $cpf);
    //Troca a barra por nada
    $cpf = str_replace("-", "", $cpf);
    $pes = $cpf;
    $sql = mysqli_query($con, "SELECT * FROM clientes WHERE cpf LIKE '%" . $pes . "%' ORDER BY cpf");

    // Descobrimos o total de registros encontrados
    $numRegistros = mysqli_num_rows($sql);
?>

    <body>
        <div class="alert alert-info">
            <strong>Info!</strong> Você pesquisou por:"<i><?php echo $pes; ?>"</i>.
        </div>
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <?php
            // Se houver pelo menos um registro, exibe-o
            if ($numRegistros != 0) {
                // Exibe os produtos e seus respectivos preços
                while ($clientes = mysqli_fetch_object($sql)) {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $clientes->nome ?></td>
                            <td><?php echo $clientes->cpf ?></td>
                            <td>
                                <a href="arquivo_cli.php?a=buscar&cli=<?php echo $clientes->cpf?>">Ver Arquivos</a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
            } else { ?>
                <div class='alert alert-danger'><strong>Atenção!</strong> Nenhum cliente foi encontrado com: <i>"<?php echo $pes ?>"</i></div>
        <?php }
        }
        ?>
        </table>
        <script src="../app.js"></script>
    </body>

</html>