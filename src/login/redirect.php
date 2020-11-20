<?php
if ( $_SESSION['logado'] != true ) {
	header('location: http://www.nuvem.space/src/login.php');
}
?>