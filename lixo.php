
<div class="container-fluid pt-5">
	<div class="container pt-2">
		<div class="row">
			<div class="col">
				<h1 style="color: #00BFFF">
					<!--<i class="fas fa-angle-double-right fa-2x"></i>-->
					<i class="fa fa-cloud fa-1x" aria-hidden="true"></i>
					Nuvem
				</h1>
				<h4 class="text-secondary">A Nuvem.space ajuda sua empresa com aplicações que facilitam seu dia a dia.</h4>
				<hr />
				<h4 class="text-secondary">Assinatura com mercado pago:</h4>
				<div class="row text-center m-1">
					<div class="col shadow bg-white rounded p-2 m-2">
						<strong class="text-success" id="pro">Plano Pro R$ 400,00</strong>
						<hr />
						<small class="text-muted">Plano de assinatura com todas as funcionalidades liberadas.</small>
						<br />
						<a name="pro" id="pro" class="btn btn-primary"
							href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c9380847712e351017715ee49570239"
							role="button">Pagar</a>
					</div>
					<div class="col shadow bg-white rounded p-2 m-2">
						<strong class="text-success" id="start">Plano Start R$ 200,00</strong>
						<hr />
						<small class="text-muted">Plano de assinatura com funcionalidades básicas.</small>
						<br />
						<a name="pro" id="pro" class="btn btn-primary"
							href="https://www.mercadopago.com/mlb/debits/new?preapproval_plan_id=2c938084770f26b9017715ab2a29038b"
							role="button">Pagar</a>
					</div>
				</div>

			</div>
			<div class="col shadow p-3 mb-5 bg-white rounded-lg">
				<form action="./src/profile.php" method="post">
					<div class="row">
						<div class="col">
							<?php echo $AVISO ?>
						</div>
					</div>
					<?php echo $avisoPagamentoLogin; ?>

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
			<div class="col text-center text-muted mb-0 mt-3">
				<p>Desenvolvido por RayanDiniz &copy;</p>
			</div>
		</div>
	</div>
</div>