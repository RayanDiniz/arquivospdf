<?php
// Inicia a sessão
session_start();
include('./src/functions/login/config.php');
include('./src/functions/login/verifica_login.php');
include('./src/components/Header-html.php');
include('./src/functions/variavel-aviso.php');
?>

<div class="container-fluid pt-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-6 text-secondary align-baseline">
                <h1 style="color: #00BFFF">
                    <!--<i class="fas fa-angle-double-right fa-2x"></i>-->
                    <i class="fa fa-cloud fa-1x" aria-hidden="true"></i>
                    Nuvem
                </h1>
                <h4>A Nuvem.space ajuda sua empresa com aplicações que facilitam seu dia a dia de trabalho.
                </h4>
                <hr />
                <p>Faça o cadastro da sua empresa gratuitamente e assine apenas as aplicações que você precisar.</p>
                <a class="btn btn-success btn-lg btn-block" href="cadastro.html" role="button">Cadastrar Empresa</a>
            </div>

            <div class="col shadow p-3 mb-5 bg-white rounded-lg">
                <form action=".src/profile.php" method="post">
					<?php if (!empty($_SESSION['login_erro'])) :
						echo "<div class='alert alert-danger'>" . $_SESSION['login_erro'] . "</div>";
						$_SESSION['login_erro'] = '';
					endif; ?>
                    <div class=" input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-building" aria-hidden="true"></i></span>
                        </div>
                        <select class="form-control form-control-lg" name="empresa" id="empresa" required>
                            <option selected>Selecione a sua Empresa</option>
                            <option value="1">exemplo 2</option>
                            <option value="1">exemplo 3</option>
                        </select>
                    </div>

                    <div class=" input-group input-group-lg mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" name="usuario" id="" class="form-control" placeholder="Nome do Usuário"
                            aria-describedby="helpId" required />
                    </div>

                    <div class=" input-group input-group-lg mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" name="senha" id="" class="form-control"
                            placeholder="Senha do Usuário" aria-describedby="helpId" required />
                    </div>

                    <button type="sumit" class="btn btn-primary btn-lg btn-block mt-3">Entrar</button>
                    <hr />
                    <small id="helpId" class="text-muted">Selecione sua empresa e digite o nome de seu usuário e a senha para logar na
                        nuvem.</small>
                    <small id="helpId" class="text-muted">Caso tenha esquecido sua senha entre em contato com o Administrativo ou com o <a
                            href="https://linkwhats.app/8a025b">Desenvolvedor</a></small>
                </form>
            </div>
        </div>
        <div class="row text-center text-muted mb-0 mt-3">
            <div class="col">
                <p>Desenvolvido por RayanDiniz &copy;</p>
            </div>
        </div>
    </div>
</div>
<?php
include('./src/components/Footer-html.php'); ?>