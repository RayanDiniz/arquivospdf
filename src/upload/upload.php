<?php
include('../login/config.php');
//include('../login/local.php');
include('../login/verifica_login.php');
include('../login/redirect.php');

$msg = false;

$cpf = $_POST['cpf_cliente'];
$cpf = str_replace(".", "", $cpf);
//Troca o traço por nada
$cpf = str_replace("-", "", $cpf);
//Troca o espaço por nada
$cpf = str_replace(" ", "", $cpf);
//Troca a barra por nada
$cpf = str_replace("-", "", $cpf);

$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];

$dia = date('d')-1;
$data = date('Y-m')."-$dia";

if (isset($_FILES['arquivo'])) {
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    if ($extensao != ".pdf") {
        $msg = "Por favor, Envie o arquivo em formato PDF. Seu arquivo  esta no formato" . $extensao;
    }else{
        $link = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../../data/"; //define o diretorio para onde enviaremos o arquivo

        $sql_code = "INSERT INTO arquivos (titulo, link, dat, tipo, cpf_cliente)
        VALUES (
            '$titulo',
            '$link',
            $data,
            '$tipo',
            '$cpf', 
        )";

        if ($conexao_pdo->query($sql_code)){
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $link); //efetua o upload
            $msg = "Arquivo enviado com sucesso!";
        }else{
            $msg = "Falha ao enviar arquivo.";
        }
    }
}
echo $msg;
echo $cpf;
echo $data;
header("Refresh: 2;url= ./");
die();
?>