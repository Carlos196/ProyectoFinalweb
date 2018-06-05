<?php  
//variables para insertar que vienen del formulario 
$nombre=$_POST['nombre'];
$URL=$_POST['URL'];
$iddocente=$_POST['iddocente'];
//conexion
$conexion=mysqli_connect("localhost","root","","app") or die("no se ha podido establcer la conecion".msql_error());

//consulta para insertar los datos
$insertar="INSERT INTO juego (Nombre,URL,Iddocente) VALUES ('$nombre','$URL','$iddocente' )";
 
 //ejecutar la consulta
 $resultado=mysqli_query($conexion,$insertar) ;

if ($resultado) {
	
	
	echo "gracias por registrar tu juego";
}else {
	echo "error al registrar tu juego";
	

}
exit;

mysqli_close($conexion);







?>