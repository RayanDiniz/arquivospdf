<?php
include('../login/config.php');
include('../login/verifica_login.php');
include('../login/redirect.php');

include("../conect.php");

$msg = false;

$cpf = $_POST["cpf"];
$titulo = $_POST["titulo"];
$tipo = $_POST["tipo"];
$dat = $_POST["dat"];

if (isset($_FILES['arquivo'])) {
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    if ($extensao != ".pdf") {
        $msg = "Por favor, Envie o arquivo em formato PDF. Seu arquivo  esta no formato" . $extensao;
    }else{
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../../data/"; //define o diretorio para onde enviaremos o arquivo

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); //efetua o upload

        $link = $novo_nome;

        $sql_code = "INSERT INTO arquivos (titulo, link, tipo, dat, id_cliente) VALUES ('$titulo', '$link', '$tipo', $dat, '$cpf')";

        if ($con->query($sql_code))
            $msg = "Arquivo enviado com sucesso!";
        else
        $msg = "Falha ao enviar arquivo.";
    }
}
echo $msg  . $dat;

/*header("Refresh: 5;url= ./");*/
die();
?>