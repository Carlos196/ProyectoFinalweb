<?php 
require_once 'clases/matriz.php';

$n=3;
$obj = new Cmatriz($n,$n);

$obj->set_Dato(2,0,"s");

$obj->mostrar();

echo $obj->get_Dato(2,0);



 ?>