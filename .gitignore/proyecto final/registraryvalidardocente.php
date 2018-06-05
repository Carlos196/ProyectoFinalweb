<?php  
$id=$_POST['iddocente'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$area=$_POST['area'];
$institucion=$_POST['institucion'];
//conexion
$conexion=mysqli_connect("localhost","root","","app") or die("no se ha podido establcer la conecion".msql_error());

//consulta para insertar los datos
$insertar="INSERT INTO docentes (Identificacion,Nombres,Apellidos,AreaDelConocimiento,Institucion) VALUES ('$id','$nombre','$apellidos','$area','$institucion' )";
 //verificar_identificación
 $verificar_identificación=mysqli_query($conexion,"SELECT * FROM docentes WHERE identificacion='$id'") ;
 if (mysqli_num_rows($verificar_identificación)>0) {
 	echo "error: ya hay un usuario con esta identificacion";
 	exit;
 }
 //ejecutar la consulta
 $resultado=mysqli_query($conexion,$insertar) ;

if ($resultado) {
	
	
	header("location:areadocente.php");
}else {
	echo "error al acceder al ova";
	

}
mysqli_close($conexion);




?>