<?php  
//variables para insertar que vienen del formulario 
$id=$_POST['idestudiante'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$grado=$_POST['grado'];
$iddocente=$_POST['iddocente'];
//conexion
$conexion=mysqli_connect("localhost","root","","app") or die("no se ha podido establcer la conecion".msql_error());

//consulta para insertar los datos
$insertar="INSERT INTO estudiantes (Identificacion,Nombres,Apellidos,Grado,Iddocente) VALUES ('$id','$nombre','$apellidos','$grado','$iddocente' )";
 //verificar_identificación para que no se repita en la base de datos y asi evitamos estudiantes repetidos
 $verificar_identificación=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE Identificacion='$id'") ;
 if (mysqli_num_rows($verificar_identificación)>0) {
 	echo "error: ya hay un usuario con esta identificacion";
 	exit;
 }
 //ejecutar la consulta
 $resultado=mysqli_query($conexion,$insertar) ;

if ($resultado) {
	
	
	header("location:areaestudiante.php");
}else {
	echo "error al acceder al ova";
	

}
mysqli_close($conexion);







?>