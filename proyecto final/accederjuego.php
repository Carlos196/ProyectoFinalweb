<?php  
//variables para ingresar que vienen del formulario del usuario ya registrado
$codigo=$_POST['codigo'];
$conexion=mysqli_connect("localhost","root","","app") or die("no se ha podido establcer la conecion".msql_error());

//ejecutamos la consulta para  ver si hay algun juego asociado a ese prefesor
$consultando="SELECT * FROM juego WHERE Iddocente='$codigo' ";
//almacenamos la variable anterior en el query y tambien le pasamos la coneccion
$resul=mysqli_query($conexion,$consultando);
//miramos las filas de codigo
$filas=mysqli_num_rows($resul);

if ($filas>0) {
	header("location:juego/index.php");
}else{
	echo "Error: la identificacion es incorrecta, verifique y vuelva a intentarlo";
}

mysqli_free_result($resul);
mysqli_close($conexion);
?>