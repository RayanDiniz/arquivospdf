<?php
include('./functions/login/config.php');
include('./functions/login/verifica_login.php');
include('./functions/login/redirect.php');
include('./components/Header-html.php');
?>
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
                <a href="src/pagamentos/" target="Post" class="list-group-item list-group-item-action bg-light">
                    <i class="fas fa-handshake" aria-hidden="true"></i>
                    <span>Pagamentos</span>
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
            <!--<h3 class="mt-4"><b><php echo $_SESSION['nome_usuario'] ?></b></h3>-->

            <iframe name="Post" src="info.php" width="100%" height="100%" frameborder=0 scrolling=yes>

            </iframe>
        </div>
        <div class=" text-center text-muted" style="margin-bottom:0">
            <p>Desenvolvido por RayanDiniz &copy;</p>
        </div>
    </div>
</div>
    <!-- /#page-content-wrapper -->
<?php include('./components/Footer-html.php'); ?>