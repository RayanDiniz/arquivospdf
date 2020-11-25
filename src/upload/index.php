<?php
include('../login/config.php');
include('../login/verifica_login.php');
include('../login/redirect.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>
    <h1>Upload de Arquivos</h1>
    <?php if (isset($msg) && $msg != false) echo "<p> $msg </p>"; ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <select class="form-control" name="cpf" id="sel1">
<?php
        $sql = mysqli_query($conexao_pdo, "SELECT * FROM clientes WHERE cpf ORDER BY nome");
        while ($clientes = mysqli_fetch_object($sql)) {

        echo '<option>'.$clientes->cpf.' - '.$clientes->nome.'</option>';
        }
?>
        </select>
        Arquivo: <input type="file" class="form-control" required name="arquivo"><br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file    "></i></span>
            </div>
            <input type="text" name="titulo" class="form-control" placeholder="Nome do Arquivo">
            <input type="text" name="tipo" class="form-control" placeholder="Tipo do Arquivo">
        </div>
        <input type="text" name="cpf" class="form-control" oninput="mascara(this)"><br>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../app.js"></script>
  </body>
</html>