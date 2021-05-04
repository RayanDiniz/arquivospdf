<?php 
include('src/login/config.php');
//include('src/login/local.php');
include('src/login/verifica_login.php');
include('src/login/redirect.php');

//if ($_SESSION['master'] === 'adm') {
  
  if (isset($_GET['del'])) {
    // Delete de cara (sem confirmação)
    $pdo_insere = $conexao_pdo->prepare('DELETE FROM arquivos WHERE id=?');
    $pdo_insere->execute(array((int)$_GET['del']));

    $link = $_GET['link'];
    unlink("data/$link");

    $titulo = $_GET['nome'];
    echo "Você deletou o arquivo: " . $titulo . " com sucesso!";
    
    //header("Refresh: 2;url= /");
  }else{
    echo "Falha ao deletar o arquivo";
  }
/*}else{
  echo 'Você não tem acesso para deletar arquivos!';
  header("Refresh: 2;url= ../");
}*/
?>