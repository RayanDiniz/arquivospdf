<?php
include('./components/Header-html.php');
?>
<div class="alert alert-info" role="alert">
    <strong>Aguarde..</strong> Seu sistema será liberado em breve
</div>
<?php

header('location: refresh:5; url=./');
include('.components/Footer-html.php')
?>
