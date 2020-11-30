<?php
include('../login/config.php');
//include('../login/local.php');
include('../login/verifica_login.php');
include('../login/redirect.php');
// Variavél para preencher o erro (se existir)
$erro = false;

// Apaga usuários
if (isset($_GET['del'])) {
	// Delete de cara (sem confirmação)
	$pdo_insere = $conexao_pdo->prepare('DELETE FROM clientes WHERE id=?');
	$pdo_insere->execute(array((int)$_GET['del']));

	// Redireciona para o index.php
	header('location: ./');
}

// Verifica se algo foi postado para publicar ou editar
if (isset($_POST) && !empty($_POST)) {
	// Cria as variáveis
	foreach ($_POST as $chave => $valor) {
		$$chave = $valor;

		// Verifica se existe algum campo em branco
		if (empty($valor)) {
			// Preenche o erro
			$erro = 'Existem campos em branco.';
		}
	}

	// Verifica se as variáveis foram configuradas
	if (empty($form_nome) || empty($form_cpf) || empty($form_usuarios_id)) {
		$erro = 'Existem campos em branco.';
	}

	$form_cpf = str_replace(".", "", $form_cpf);
	$form_cpf = str_replace("-", "", $form_cpf);
	$form_cpf = str_replace(" ", "", $form_cpf);
	$form_cpf = str_replace("-", "", $form_cpf);

	// Verifica se o usuário existe
	$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM clientes WHERE cpf = ?');
	$pdo_verifica->execute(array($form_cpf));

	// Captura os dados da linha
	$cli_id = $pdo_verifica->fetch();
	$cli_id = $cli_id['id'];

	// Verifica se tem algum erro
	if (!$erro) {
		// Se o usuário existir, atualiza
		if (!empty($cli_id)) {
			$pdo_insere = $conexao_pdo->prepare('UPDATE clientes SET nome=?, cpf=?, ususarios_id=? WHERE id=?');
			$pdo_insere->execute(array($form_nome,  $form_cpf, $form_usuarios_id, $cli_id));

			// Se o usuário não existir, cadastra novo
		} else {
			$pdo_insere = $conexao_pdo->prepare('INSERT INTO clientes (nome, cpf, usuarios_id) VALUES (?, ?, ?)');
			$pdo_insere->execute(array($form_nome, $form_cpf, $form_usuarios_id));
		}
	}
}
?>
<!doctype html>
<html lang="pt-br">

<head>
	<title>Cliente</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<h3>Cadastro de Cliente</h3>

		<form action="" method="post">

			<div class="input-group">
				<label class="form-control-plaintext">Identificação de Usuário:</label>
				<input type="text" readonly class="form-control-plaintext" name="form_usuarios_id" value="<?php echo	$_SESSION['user_id']	?>">
			</div>
			<div class="form-row form-group">
				<div class="col-7">
					<label>Nome Completo do Cliente</label>
					<input type="text" class="form-control" placeholder="Nome do Cliente" name="form_nome" required>
				</div>
				<div class="col">
					<label>CPF</label>
					<input type="text" class="form-control" placeholder="CPF do Cliente" name="form_cpf" required oninput="mascara(this)">
				</div>

				<?php if (!empty($erro)) : ?>
					<div class="alert alert-danger" role="alert">
						<strong>Atenção!</strong><?php echo $erro; ?>
					</div>
				<?php endif; ?>

			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</div>
		</form>

		<?php
		// Mostra os usuários
		$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM clientes ORDER BY id DESC');
		$pdo_verifica->execute();
		?>

		<h3>Clientes já cadastrados:</h3>
		<table border="1" cellpadding="5">
			<tr>
				<th>Nome do Cliente</th>
				<th>CPF</th>
				<th>Excluir Cliente</th>
			</tr>
			<?php
			while ($fetch = $pdo_verifica->fetch()) {
				$id_cli = $fetch['id'];
				$nome	=	$fetch['nome'];
				$cpf	=	$fetch['cpf'];

			?>
				<tr>
					<td><?php echo $nome ?></td>
					<td><?php echo $cpf ?></td>

					<td> <a href="?del=<?php echo $id_cli ?>">Excluir<i style="color:#FF6347;" class="fas fa-user-times"></i></a> </td>

				</tr>
			<?php	}	?>
		</table>

	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="http://nuvem.space/src/app.js"></script>
</body>

</html>