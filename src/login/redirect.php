<?php
if ( $_SESSION['logado'] != true ) {
	header('location: /adivocacia/src/login.php');
}
?>