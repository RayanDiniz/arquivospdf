<?php
include('src/login/config.php');
//include('src/login/local.php');
include('src/login/verifica_login.php');
include('src/login/redirect.php');

  $nome =  $_SESSION['nome_usuario'];
  $email= $_POST['email'];
  $mensagem= $_POST['mensagem'];
  $to = "rayancassiokiol@gmail.com";
  $assunto = "Mensagem de ".$nome." do e-mail: ".$email;
  mail($to,$assunto,$mensagem);
  
// Redireciona para o info.php
header('location: ./info.php');
?>