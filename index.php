<?php
include('src/login/config.php');
//include('src/login/local.php');
include('src/login/verifica_login.php');
include('src/login/redirect.php');
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Nuvem</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de armazenamento de arquivos.">
    <meta name="author" content="Rayan Diniz">

    <link rel="stylesheet" href="src/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading"> <?php echo $_SESSION['nome_usuario'] ?> </div>
            <div class="list-group list-group-flush">
                <a href="." class="list-group-item list-group-item-action bg-light">
                    <i class="fas fa-home" aria-hidden="true"></i>
                    <span>Inicio</span>
                </a>

                <a href="src/cria-clientes/" target="Post" class="list-group-item list-group-item-action bg-light">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>Clientes</span>
                </a>

                <?php if ($_SESSION['master'] === 'adm') { ?>
                    <a href="src/cria-usuarios/" target="Post" class="list-group-item list-group-item-action bg-light">
                        <i class="fas fa-user-tie" aria-hidden="true"></i>
                        <span>Usuários do Sistema</span>
                    </a>
                <?php    }; ?>

                <a href="src/upload" target="Post" class="list-group-item list-group-item-action bg-light">
                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                    <span>Enviar Arquivo</span>
                </a>

                <a href="https://www.ilovepdf.com/pt/word_para_pdf" target="Post" class="list-group-item list-group-item-action bg-light">
                    <i class="fas fa-sync" aria-hidden="true"></i>
                    <span>Converter Arquivo</span>
                </a>

                <a href="src/login/sair.php" class="list-group-item list-group-item-action bg-light">
                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                    <span>Sair</span>
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a href="#" id="menu-toggle">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            Busca:&nbsp;&nbsp;
                        </li>
                        <li class="nav-item">

                            <form name="frmBusca" method="post" target="Post" action="src/pesquisa/cliente.php?a=buscar">
                                <div class="input-group">
                                    <input name="cliente" id="txt_consulta" placeholder="pelo nome do cliente" type="text" class="form-control" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </li>
                        <li class="nav-item">
                            &nbsp;&nbsp;ou&nbsp;&nbsp;
                        </li>
                        <li class="nav-item">

                            <form name="frmBusca" method="post" target="Post" action="src/pesquisa/cpf.php?a=buscar">
                                <div class="input-group">
                                    <input name="cpf" id="txt_consulta" placeholder="pelo CPF do cliente" type="text" oninput="mascara(this)" class="form-control" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </li>
                        <li class="nav-item">
                            &nbsp;&nbsp;ou&nbsp;&nbsp;
                        </li>
                        <li class="nav-item">

                            <form name="frmBusca" method="post" target="Post" action="src/pesquisa/arquivo.php?a=buscar">
                                <div class="input-group">
                                    <input name="arquivo" id="txt_consulta" placeholder="pelo nome do arquivo" type="text" class="form-control" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fas fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid" style="height:80%;">
                <h3 class="mt-4"><b><?php echo $_SESSION['nome_usuario'] ?></b></h3>

                <iframe name="Post" src="info.php" width="100%" height="100%" frameborder=0 scrolling=yes>

                </iframe>
            </div>
            <div class=" text-center text-muted" style="margin-bottom:0">
                <p>Desenvolvido por RayanDiniz &copy;</p>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="http://nuvem.space/src/app.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>