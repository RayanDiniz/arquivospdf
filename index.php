<?php
// Inicia a sessão
include('./src/functions/config.php');
include('./src/functions/login/verifica_login.php');
include('./src/components/Header-html.php');
//include('./src/functions/variavel-aviso.php');
?>

<div class="container-fluid pt-5">
    <div class="container pt-5">
        <div class="card text-center shadow p-3 m-5 bg-white rounded-lg">
            <h1 style="color: #00BFFF">
                <!--<i class="fas fa-angle-double-right fa-2x"></i>-->
                <i class="fa fa-cloud fa-1x" aria-hidden="true"></i>
                Drive
            </h1>
            <form action="./src/profile.php" method="post">
                <?php if (!empty($_SESSION['login_erro'])) :
						echo "<div class='alert alert-danger'>" . $_SESSION['login_erro'] . "</div>";
						$_SESSION['login_erro'] = '';
				endif; ?>

                <div class=" input-group input-group-lg mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" name="usuario" id="" class="form-control" placeholder="Usuário"
                        aria-describedby="helpId" required />
                </div>

                <div class=" input-group input-group-lg mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input type="password" name="senha" id="" class="form-control" placeholder="Senha"
                        aria-describedby="helpId" required />
                </div>

                <button type="sumit" class="btn btn-primary btn-lg btn-block mt-3">Entrar</button>
                <hr />
                <small id="helpId" class="text-muted">Digite o nome de seu usuário e a senha
                    para logar na
                    nuvem.</small>
                <small id="helpId" class="text-muted">Caso tenha esquecido sua senha entre em contato com o
                    Administrativo ou com o <a href="https://linkwhats.app/8a025b">Desenvolvedor</a></small>
            </form>
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