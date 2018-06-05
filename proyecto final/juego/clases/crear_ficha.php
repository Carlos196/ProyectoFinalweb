<?php
require_once 'clases/collection.php';
require_once 'clases/fichas.php';

@session_start();
if (!isset($_SESSION["fichas"])) {
	$_SESSION["fichas"] = new collection();
	$obj = new Ficha(1, "img/img_1.png");
	$_SESSION["fichas"]->add($obj);
	$obj = new Ficha(2, "img/img_2.png");
	$_SESSION["fichas"]->add($obj);
	$obj = new Ficha(3, "img/img_3.png");
	$_SESSION["fichas"]->add($obj);
	$obj = new Ficha(4, "img/img_4.png");
	$_SESSION["fichas"]->add($obj);
	$obj = new Ficha(5, "img/img_5.png");
	$_SESSION["fichas"]->add($obj);
	$obj = new Ficha(6, "img/img_6.png");
	$_SESSION["fichas"]->add($obj);
	$obj = new Ficha(0, "img/img_0.png");
	$_SESSION["fichas"]->add($obj);
}
/*
$_SESSION["fichas"]->rewind();
while ($_SESSION["fichas"]->valid()) {
	$data = $_SESSION["fichas"]->current();
	echo $data->get_id();
	echo "<img src='".$data->get_img()."'>";
	$_SESSION["fichas"]->next();
}*/

//session_destroy();


 ?>