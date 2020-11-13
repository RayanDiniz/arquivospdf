<?php
include('../login/config.php');
include('../login/verifica_login.php');
include('../login/redirect.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos com PHP</title>
</head>

<body>
    <a href="/adivocacia">Voltar ao Inicio</a>
    <h1>Upload de Arquivos</h1>
    <?php if (isset($msg) && $msg != false) echo "<p> $msg </p>"; ?>
    <form action="/adivocacia/src/upload/upload.php" method="POST" enctype="multipart/form-data">
        Arquivo: <input type="file" required name="arquivo"><br>
        
        <input type='text' name='cpf' oninput="mascara(this)"><br>
        <input type='text' name='titulo'><br>
        <input type='text' name='tipo'><br>
        <input type='date' name='dat'><br>
        <input type="submit" value="Salvar">
    </form>
	<script src="../app.js"></script>
</body>

</html>