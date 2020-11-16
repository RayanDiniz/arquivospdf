<?php
$dia = date('d')-1;
$data = date('Y-m')."-$dia";

$data = implode("/",array_reverse(explode("-",$data)));

echo $data;