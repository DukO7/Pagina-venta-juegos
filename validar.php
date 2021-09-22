<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

//Conectar a bd
$conexion= new mysqli("localhost","root","","usuarios");
$consulta="SELECT * FROM datos WHERE Nick='$usuario' and Password='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0){
	header("Location:index.html");
} 
else{
	echo "No coinciden los datos ingresados";
}
mysqli_free_result($resultado);
mysqli_close($conexion);