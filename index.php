<?php
// Inclui o arquivo de configuração
include('src/login/config.php');

// Inclui o arquivo de verificação de login
include('src/login/verifica_login.php');

// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('src/login/redirect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Sistema de busca interna</title>
</head>

<body>
	Olá <b><?php echo $_SESSION['nome_usuario'] ?></b>, <a href="src/login/sair.php">clique aqui</a>
	para sair.<br>
    Para enviar novos arquivos <a href="src/upload">clique aqui</a>
<?php
if ($_SESSION['usuario'] === 'rayan') {
	echo '<a href="src/cria-usuarios/">Criar usuário</a>';
};
?>
	<form name="frmBusca" method="post" action="src/pesq/?a=buscar">
		<input type="text" name="cpf" oninput="mascara(this)"/>
		<input type="submit" value="Buscar" />
	</form>
	<script src="src/app.js"></script>
</body>

</html>