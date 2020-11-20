<?php
if ( $_SESSION['logado'] != true ) {
	header('location: ../arquivospdf/src/login.php');
}
?>