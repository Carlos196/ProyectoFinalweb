<?php  
//variables para ingresar que vienen del formulario del usuario ya registrado
$identificacion=$_POST['identificacion'];
$conexion=mysqli_connect("localhost","root","","app") or die("no se ha podido establcer la conecion".msql_error());

//ejecutamos la consulta para  verificar la identificacion que es el campo unico para loguianos
$consultando="SELECT * FROM docentes WHERE Identificacion='$identificacion' ";
//almacenamos la variable anterior en el query y tambien le pasamos la coneccion
$resul=mysqli_query($conexion,$consultando);
//miramos las filas de identificacion
$filas=mysqli_num_rows($resul);

if ($filas>0) {
	header("location:areadocente.php");
}else{
	echo "Error: la identificacion es incorrecta, verifique y vuelva a intentarlo";
}

mysqli_free_result($resul);
mysqli_close($conexion);
?>
