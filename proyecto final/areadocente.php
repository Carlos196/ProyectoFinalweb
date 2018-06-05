<!DOCTYPE html>
<html>
<head>
	<title>Area Docente </title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" type="text/css" href="css/estilosformulario.css">
</head>
<body>
<h1 class="h1">Danos informacion sobre el juego</h1> 
<form action="registrarjuego.php" method="post" class="formulario_de_registro">
		<h2 class="titulo_formulario">REGISTRA TU JUEGO POR FAVOR</h2>
		<div class="los-inputs">
			
			<input type="text" name="nombre" required placeholder="Nombre Del Juego" class="input-47">
			<input type="link" name="URL" required placeholder="URL" class="input-47">
			<input type="text" name="iddocente" required placeholder="Ingresa Tu Cogigo" class="input-100">
			
			<input type="submit" value="REGISTRAR JUEGO" class="boton-registrar">
	
		</div>
	</form>
</body>
</html>