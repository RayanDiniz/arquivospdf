<!doctype html>
<html lang="pt-br">
  <head>
    <title>Usuários</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>
  <?php
include('../login/config.php');
//include('../login/local.php');
include('../login/verifica_login.php');
include('../login/redirect.php');
if ($_SESSION['master'] === 'adm') {
	// Variavél para preencher o erro (se existir)
	$erro = false;

	// Apaga usuários
	if (isset($_GET['del'])) {
		// Delete de cara (sem confirmação)
		$pdo_insere = $conexao_pdo->prepare('DELETE FROM usuarios WHERE id=?');
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
		if (empty($form_usuario) || empty($form_senha) || empty($form_nome)) {
			$erro = 'Existem campos em branco.';
		}

		// Verifica se o usuário existe
		$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios WHERE usuario = ?');
		$pdo_verifica->execute(array($form_usuario));

		// Captura os dados da linha
		$user_id = $pdo_verifica->fetch();
		$user_id = $user_id['id'];

		// Verifica se tem algum erro
		if (!$erro) {
			// Se o usuário existir, atualiza
			if (!empty($user_id)) {
				$pdo_insere = $conexao_pdo->prepare('UPDATE usuarios SET usuario=?, senha=?, nome=? WHERE id=?');
				$pdo_insere->execute(array($form_usuario,  crypt($form_senha), $form_nome, $user_id));

				// Se o usuário não existir, cadastra novo
			} else {
				$pdo_insere = $conexao_pdo->prepare('INSERT INTO usuarios (usuario, senha, nome) VALUES (?, ?, ?)');
				$pdo_insere->execute(array($form_usuario, crypt($form_senha), $form_nome));
			}
		}
	}
?>
	<div class="container">
		<h3>Usuários do Sistema</h3>

		<p>Para editar, apenas digite o nome de usuário que deseja editar e altere os outros campos.</p>
		<p><a href="../login.php" target="/">Clique aqui</a> para ir a tela de login e testar o novo usuário em nova aba.</p>

		<form action="" method="post">
			<div class="form-row form-group">
				<div class="col">
					<label>Usuário</label>
					<div class="input-group flex-nowrap">
						<span class="input-group-text" id="addon-wrapping">@</span>
						<input type="text" class="form-control" placeholder="Usuário" name="form_usuario" required>
					</div>
				</div>
				<div class="col-7">
					<label>Senha do Usuário</label>
					<input type="password" class="form-control" placeholder="Senha" name="form_senha" required>
				</div>
			</div>

			<label>Nome Completo do Usuário</label>
			<div class="input-group mb-3">
				<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user"></i></span>
				<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Nome" name="form_nome" required>
			</div>
	
			<?php if (!empty($erro)) : ?>
				<div class="alert alert-danger" role="alert">
					<strong>Atenção!</strong><?php echo $erro; ?>
				</div>
			<?php endif; ?>

			<div class="btn-group">
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</div>
		</form>
		<br/>
		<?php
		// Mostra os usuários
		$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios ORDER BY id DESC');
		$pdo_verifica->execute();
		?>

		<table border="1" cellpadding="5">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Usuário</th>
				<th>Senha Criptografada</th>
				<th>Ação</th>
			</tr>
			<?php
			while ($fetch = $pdo_verifica->fetch()) {
				$id_user = $fetch['id'];
				$master = $fetch['master'];
				
				echo '<tr>';
				echo '<td>' . $id_user . '</td>';
				echo '<td>' . $fetch['nome'] . '</td>';
				echo '<td>' . $fetch['usuario'] . '</td>';
				echo '<td>' . $fetch['senha'] . '</td>';
				if($master != 'adm'){ 	
				echo '<td> <a style="color:red;" href="?del=' . $fetch['id'] . '">Apagar</a> </td>';	
				}else{echo '<td>Não Apagar Adm</td>';};
				echo '</tr>';
			}
			?>
		</table>

		<?php
		} else {
			echo 'Você não tem acesso a essa pagina!';
			header("Refresh: 2;url= ../../");
		}
		?>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>