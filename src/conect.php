<?php
$user = "u267435245_Adb";
$password = "Lambchgoyw123";
$database = "u267435245_db";
$hostname = "localhost";

$con = @mysqli_connect($hostname, $user, $password) or die("Não foi possível a conexão com o Banco");

// Selecionando banco
$db = @mysqli_select_db($con, $database) or die("Não foi possível selecionar o Banco");
?>