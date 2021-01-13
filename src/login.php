<?php
include('./login/config.php');
// Inicia a sessão
session_start();
?>

<!doctype html>
<html lang="pt-br">

<head>
	<title>Login</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style type="text/css">
		html,
		body,
		.row,
		.container {
			height: 100%;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-sm-5">
				<div class="text-center" style="color: #00BFFF;">
					<!--<i class="fas fa-angle-double-right fa-2x"></i>-->
					<i class="fa fa-cloud fa-5x" aria-hidden="true"></i>
				</div>
				<?php
					$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM pagamentos WHERE status = 0 AND boleto != "null"');
					$pdo_verifica->execute();
					
					while ($fetch = $pdo_verifica->fetch()) {
						$data1 = $fetch['data'];
						$data1 = implode("/", array_reverse(explode("-", $data1)));
						$data2 = date ('d/m/Y');
						// Comparando as Datas
						if (strtotime($data1) > strtotime($data2)) {
							echo '<div class="alert alert-info" role="alert"><strong>Atenção!</strong> Seu boleto está disponível para pagamento e vence no dia '.$data1.'.</div>';
						}elseif (strtotime($data1) == strtotime($data2)) {
							echo '<div class="alert alert-warning" role="alert"><strong>Atenção!</strong> Seu boleto Vence hoje.</div>';
						}else{
							echo '<div class="alert alert-danger" role="alert"><strong>Atenção!</strong> Seu boleto Venceu em '.$data1.', entre em contato com o desenvolvedor.</div>';
						}
					}
				?>
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