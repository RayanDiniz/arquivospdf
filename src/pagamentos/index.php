<!doctype html>
<html lang="pt-br">
  <head>
    <title>Pagamentos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    ?>
    <h1>Controle de pagamento do Sistema</h1>
    <?php
      // Mostra os usuários
      $pdo_verifica = $conexao_pdo->prepare('SELECT * FROM pagamentos ORDER BY id DESC');
      $pdo_verifica->execute();
    ?>
    <table>
      <tr><th>Data</th><th>Boleto</th><th>Status</th></tr>
	<?php
	  while ($fetch = $pdo_verifica->fetch()) {
        $id_pg = $fetch['id'];

      echo '<tr>';
      echo '<td>' . $fetch['data'] . '</td>';
      echo '<td>' . $fetch['boleto'] . '</td>';
      echo '<td>' . $fetch['status'] . '</td>';
      echo '</tr>';

      }
    ?>
    </table>
    <?php
      }else{
        echo 'Você não tem acesso a essa pagina!';
        header("Refresh: 2;url= ../../");
      }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>