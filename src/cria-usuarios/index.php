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

<html>

<head>
	<meta charset="UTF-8">

	<title>Login</title>
</head>

<body>
	<p>Para editar, apenas digite o nome de usuário que deseja editar.</p>
	<p><a href="../login.php" target="/">Clique aqui</a> para voltar a tela de login e testar.</p>
	<form action="" method="post">
		<table>
			<tr>
				<td>Usuário</td>
			</tr>
			<tr>
				<td><input type="text" name="form_usuario" required></td>
			</tr>
			<tr>
				<td>Senha</td>
			</tr>
			<tr>
				<td><input type="password" name="form_senha" required></td>
			</tr>
			<tr>
				<td>Nome Completo</td>
			</tr>
			<tr>
				<td><input type="text" name="form_nome"></td>
			</tr>

			<?php if (!empty($erro)) : ?>
				<tr>
					<td style="color: red;"><?php echo $erro; ?></td>
				</tr>
			<?php endif; ?>

			<tr>
				<td><input type="submit" value="Entrar"></td>
			</tr>
		</table>
	</form>

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
</body>

</html>