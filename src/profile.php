<?php
include('./functions/login/config.php');
include('./functions/login/verifica_login.php');
include('./functions/login/redirect.php');
include('./components/Header-html.php');
include('./functions/variavel-aviso.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
    <a class="navbar-brand" href="profile.php">
        <img src="img/company-default.png" alt="Empresa" width="30" height="30" class="d-inline-block align-top rounded-circle shawdom border border-success" />
        Nome da Empresa
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        </ul>
        <a class="navbar-nav btn btn-primary" href="functions/login/sair.php" role="button">
            <i class="fas fa-sign-out-alt"> Sair</i>
        </a>
    </div>
</nav>

<div class="container-fluid pt-5">
    <div class="row">
        <div class="col text-center p-4">
        
            <img src="img/user-default.jpg" class="rounded-circle shadow" width="100" height="100" alt="usuario"/>
            
            <h5><?php echo $_SESSION['nome_usuario'] ?></h5>
            <small>@<?php echo $_SESSION['usuario'] ?></small>
            <hr />
            <ul class="list-unstyled">
                <li>Identificação: <?php echo $_SESSION['user_id'] ?>.</li>
                <li>Cargo: Administrativo.</li>
                <?php if ($_SESSION['master'] === 'adm') { ?>
                <li>Administrador do Sistema</li>
                <?php    }; ?>
            </ul>
            <hr />
        </div>

        <div class="col-12">
            <h4 class="text-secondary">Aplicativos Contratados:</h4>
            <?php echo $AVISO ?>
            <div class="row text-center m-1">
                <div class="col shadow bg-white rounded p-2 m-2">
                    <strong class="text-success" id="pro">Serviço de Armazenamento de Arquivos - Pro R$ 400,00</strong>
                    <hr />
                    <small class="text-muted">50GB de Espaço.</small>
                    <br />
                    <a name="pro" id="pro" class="btn btn-primary"
                        href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c9380847712e351017715ee49570239"
                        role="button">Pagar</a>
                </div>
                <div class="col shadow bg-white rounded p-2 m-2">
                    <strong class="text-success" id="start">Serviço de Armazenamento de Arquivos - Start R$ 200,00</strong>
                    <hr />
                    <small class="text-muted">25GB de Espaço.</small>
                    <br />
                    <a name="pro" id="pro" class="btn btn-primary"
                        href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c938084770f26b9017715ab2a29038b"
                        role="button">Pagar</a>
                </div>
            </div>
            <hr />
        </div>

        <div class="col-12">
            <h4 class="text-secondary">Assine agora planos completos:</h4>
            <div class="row text-center m-1">
                <div class="col shadow bg-white rounded p-2 m-2">
                    <strong class="text-secondary" id="pro">Planos Completos</strong>
                    <hr />
                    <strong class="text-success" id="pro">valor / mês</strong><br/>
                    <small class="text-muted">Planos em Desenvolvimento.</small>
                    <br />
                    <a name="pro" id="pro" class="btn btn-primary"
                        href="#"
                        role="button">Contratar</a>
                </div>
            </div>
            <hr />
        </div>

        <div class="col-12 text-center text-muted mb-0 mt-3">
            <p>Desenvolvido por RayanDiniz &copy;</p>
        </div>   
    </div>
</div>   
<?php include('./components/Footer-html.php'); ?>