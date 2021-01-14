<?php
include('./variavel-aviso.php');
// Inicia a sessão
session_start();

include('./components/Header-html.php');
?>
<body>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-sm-5">
				<div class="text-center" style="color: #00BFFF;">
					<!--<i class="fas fa-angle-double-right fa-2x"></i>-->
					<i class="fa fa-cloud fa-5x" aria-hidden="true"></i>
				</div>
				<?php echo $avisoPagamentoLogin ?>
				<form action="../" method="post">
					<?php if (!empty($_SESSION['login_erro'])) :
						echo "<div class='alert alert-danger'>" . $_SESSION['login_erro'] . "</div>";
						$_SESSION['login_erro'] = '';
					endif; ?>
					<div class=" input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
						</div>
						<input type="text" name="usuario" id="" class="form-control" placeholder="Nome do Usuario" aria-describedby="helpId" required>
					</div>
					<small id="helpId" class="text-muted">Digite o nome de seu usuario para logar na nuvem.</small>

					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
						</div>
						<input type="password" name="senha" id="" class="form-control" placeholder="Senha do Usuario" aria-describedby="helpId" required>
					</div>
					<small id="helpId" class="text-muted">Digite a senha de seu usuario para logar na nuvem.</small>
					<br />
					<div class="text-center">
						<button type="sumit" class="btn btn-primary btn-lg text-center">Entrar</button>
					</div>
					<br />
					<div class=" text-center text-muted" style="margin-bottom:0">
						<p>Desenvolvido por RayanDiniz &copy;</p>
					</div>
				</form>
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