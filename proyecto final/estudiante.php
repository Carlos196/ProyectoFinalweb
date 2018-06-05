<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0"> 
	
	<title>Estudiante</title>
	<link rel="stylesheet" type="text/css" href="css/estilosformulario.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-inverse ">
	<div><img src="img/baner.png"  class="img-responsive" alt="baner"></div>
</nav>
<form action="validarlogueoestudiante.php" method="post" class="formulario_de_registrado">
		<h2 class="titulo_formululario_registrado">ACCEDER AL OVA</h2>
		<div class="los-inputs_registrados">
			<input type="number" name="identificacion" required placeholder="Identificación" class="input-100">
			<input type="submit" value="Ingresar" class="boton-registrar">
	<a href="#" class="link">¿Has olvidado tu contraseña? </a>		
		</div>
	</form>

<form action="registraryvalidarestudiante.php" method="post" class="formulario_de_registro">
		<h2 class="titulo_formulario">REGISTRATE EN EL OVA</h2>
		<div class="los-inputs">
			<input type="number" name="idestudiante" required placeholder="Identificación" class="input-47">
			<input type="text" name="nombre" required placeholder="Nombres" class="input-47">
			<input type="text" name="apellidos" required placeholder="Apellidos" class="input-47">
			<input type="text" name="grado" required placeholder="Grado" class="input-47">
			<input type="number" name="iddocente" required placeholder="Ingresa El Codigo De Tu Docente" class="input-100">
			<input type="submit" value="REGISTRATE" class="boton-registrar">
	<p class="link">¿ya estas registrado?<a href="formularioparausuarioregistrado.php">Entra aquí</a></p>		
		</div>
	</form>


</body>
</html>