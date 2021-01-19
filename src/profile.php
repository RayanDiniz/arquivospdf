<?php
include('./functions/login/config.php');
include('./functions/login/verifica_login.php');
include('./functions/login/redirect.php');
include('./components/Header-html.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand img-circle shawdom" href="#">
        <img src="empresa.png" alt="Empresa" width="30" height="30" class="d-inline-block align-top" />
        Arcor
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        </ul>
        <a name="" id="" class="navbar-nav btn btn-primary" href="functions/login/sair.php" role="button">
            <i class="fas fa-sign-out-alt"></i>
            Sair
        </a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center p-4">
        
            <img src="img/user-default.png" class="rounded-circle shadow" width="100" height="100" alt=""/>
            
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
        </div>
        <div class="col-12">
            <div class="row mt-2">
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        <strong>BLOQUEADO!</strong> Seu serviço foi bloqueado.
                    </div>
                </div>
            </div>
            <h4 class="text-secondary">Assine agora Pacotes e contrate varios serviços:</h4>
            <div class="row text-center m-1">
                <div class="col shadow bg-white rounded p-2 m-2">
                    <strong class="text-secondary" id="pro">Plano Master</strong>
                    <hr />
                    <strong class="text-success" id="pro">5.000,00 / mês</strong><br/>
                    <small class="text-muted">Plano de assinatura com todas as aplicações que precisar.</small>
                    <br />
                    <a name="pro" id="pro" class="btn btn-primary"
                        href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c9380847712e351017715ee49570239"
                        role="button">Contratar</a>
                </div>
                <div class="col shadow bg-white rounded p-2 m-2">
                    <strong class="text-secondary" id="start">Plano Pro</strong>
                    <hr />
                    <strong class="text-success" id="pro">2.500,00 / mês</strong><br/>
                    <small class="text-muted">Plano de assinatura com 8 aplicações disponíveis.</small>
                    <br />
                    <a name="pro" id="pro" class="btn btn-primary"
                        href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c9380847712e351017715ee49570239"
                        role="button">Contratar</a>
                </div>
                <div class="col shadow bg-white rounded p-2 m-2">
                    <strong class="text-secondary" id="pro">Plano Start</strong>
                    <hr />
                    <strong class="text-success" id="pro">1.500,00 / mês</strong><br/>
                    <small class="text-muted">Plano de assinatura com 4 aplicações disponíveis.</small>
                    <br />
                    <a name="pro" id="pro" class="btn btn-primary"
                        href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c9380847712e351017715ee49570239"
                        role="button">Contratar</a>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include('./components/Footer-html.php'); ?>