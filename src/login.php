<?php
// Inicia a sessão
session_start();

include('./components/Header-html.php');
?>
<div class="container-fluid bg-light pt-4">
	<div class="container p-5">
		<div class="row pt-5">
			<div class="col">
				<h1 style="color: #00BFFF">
					<!--<i class="fas fa-angle-double-right fa-2x"></i>-->
					<i class="fa fa-cloud fa-1x" aria-hidden="true"></i>
					Nuvem
				</h1>
				<h4 class="text-secondary">A Nuvem.space ajuda você armazenar com segurança os documentos de sua
					empresa com facilidade.
				</h4>
			</div>
			<div class="col shadow p-3 mb-5 bg-white rounded-lg">
				<?php include('./variavel-aviso.php');
					echo $avisoPagamentoLogin; ?>
				<form action="../" method="post">
					<?php if (!empty($_SESSION['login_erro'])) :
						echo "<div class='alert alert-danger'>" . $_SESSION['login_erro'] . "</div>";
						$_SESSION['login_erro'] = '';
					endif; ?>
					<div class=" input-group input-group-lg">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
							</div>
							<input type="text" name="usuario" id="" class="form-control" placeholder="Nome do Usuário"
								aria-describedby="helpId" required disabled />
						</div>

						<div class=" input-group input-group-lg mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
							</div>
							<input type="password" name="senha" id="" class="form-control"
								placeholder="Senha do Usuário" aria-describedby="helpId" required disabled />
						</div>

						<button type="sumit" class="btn btn-primary btn-lg btn-block mt-3">Entrar</button>

						<hr />
						<small id="helpId" class="text-muted">Digite o nome de seu usuário e a senha para logar na
							nuvem.</small>
						<small id="helpId" class="text-muted">Caso tenha esquecido sua senha entre em contato com o <a
								href="https://linkwhats.app/8a025b">Desenvolvedor</a></small>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col text-center text-muted mb-0">
				<p>Desenvolvido por RayanDiniz &copy;</p>
			</div>
		</div>
	</div>
</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>