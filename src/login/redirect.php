<?php
if ( $_SESSION['logado'] != true ) {
	header('location: http://nuvem.space/src/login.php');
}
?>