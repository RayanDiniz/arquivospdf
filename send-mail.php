<?php

include('src/login/verifica_login.php');

  $nome =  $_SESSION['nome_usuario'];
  $email= $_POST['email'];
  $mensagem= $_POST['mensagem'];
  $to = "rayancassiokiol@gmail.com";
  $assunto = "Mensagem de ".$email;
  mail($to,$assunto,$mensagem);
?>