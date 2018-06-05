<?php 
require_once 'clases/tablero.php';
@session_start();

if (!isset($_SESSION["tablero"]))
{
  $_SESSION["tablero"] = new tablero(7);
  $_SESSION["tablero"]->llenar();

}
error_reporting(E_ALL ^ E_NOTICE);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>JUEGO OVA GRADO 1</title>
	<link rel="stylesheet" type="text/css" href="stile.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	
</head>
<body>

<div id="capaMadre">
	<header>
		<img src="img/baner.png" width="800px" id="logo">
	</header>
	<br>
	<section id="juego">
		<div class="estadisticas">
			<div>
				<div>0</div>
				<div><img src="img/img_1.png" width="25px"></div>
				<div>10</div>
			</div>
			<div>
				<div>0</div>
				<div><img src="img/img_2.png" width="25px"></div>
				<div>10</div>
			</div>
			<div>
				<div>0</div>
				<div><img src="img/img_3.png" width="25px"></div>
				<div>10</div>
			</div>
			<div>
				<form id="position" action="./#juego" method="post">
					<span>P1:</span>
					<input id="p1" type="" name="p1" style="width: 20px;">
					<span>P2:</span>
					<input id="p2" type="" name="p2" style="width: 20px;">
					<button name="enviar" id="bt_enviar">jugar</button>
				</form>
			</div>
		</div>
		<?php

		//$_SESSION["tablero"]->get_Cuadricula()->mostrar();
		echo $_SESSION["tablero"]->pintar();
		

		if (isset($_POST["fin"])) {
			session_destroy();
			header('Location: ./?ini=si#juego');
		}
		if (isset($_POST["enviar"])) {
			$move= $_SESSION["tablero"]->valid_move($_POST["p1"], $_POST["p2"]);
			$a = $_SESSION["tablero"]->linea();
			header("Location: ./?move=".$move."".$a);
			
		}
		$in=$_GET["ini"];
		if ($in=="si") {
			$_SESSION["tablero"]->linea();
		}

		
		//echo $_GET["move"];
		if (isset($_GET["move"])) {
			if ($_GET["move"]) {
					echo "<script type='text/javascript'>
				$(document).ready(function() {
						$('#".$_GET['a']."').addClass('eliminado');
						$('#".$_GET['b']."').addClass('eliminado');
						$('#".$_GET['c']."').addClass('eliminado');
				}); </script>";
			} else {
				//echo "<script>alert('movimiento incorrecto')</script>";
			}
		}
	
		?>
	</section>

	<footer>
		<form id="destroy" action="index.php" method="post">
			<button name="fin">nuevo juego</button>
		</form>
	</footer>
</div>
	
<script type="text/javascript">
	$(document).ready(function() {
		console.log("!ready");

		var clicks= 1;
		$("td").click(function(){
			var id= $(this).attr("id");
			
			$(this).css("background-color","red");

			if (clicks == 1) {
				console.log($("#p1").val(id));
				clicks++;
				
			} else {
				console.log($("#p2").val(id));
				clicks--;
				$("#bt_enviar").click();
				
				//$("#p2").addClass("eliminado");
			}
		});
	});
</script>
</body>
</html>