<?php
include('../login/config.php');
include('../login/verifica_login.php');
include('../login/redirect.php');

/*if ($_SESSION['usuario'] === 'rayan') {*/
  
    if (isset($_GET['del'])) {
        // Delete de cara (sem confirmação)
        $pdo_insere = $conexao_pdo->prepare('DELETE FROM arquivos WHERE id=?');
        $pdo_insere->execute(array((int)$_GET['del']));

        $link = $_GET['link'];    
        
        if (!unlink( 'adivocacia/data/'.$link))
        {
          echo ("Erro ao deletar $link");
        }
        else
        {
          echo ("Deletado $link com sucesso!");
        }
        
        echo 'Arquivo deletado' . $link;
        
       /* header("Refresh: 5;url= ../../");*/
    }
/*}else{
    echo 'Você não tem acesso!';
    header("Refresh: 5;url= ../../");
}*/
?>