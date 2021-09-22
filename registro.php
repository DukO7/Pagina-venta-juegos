<html>

<head>
	<title>Registro exitoso</title>
<link rel="stylesheet" href="css/creative.css">
</head>
<body background="img/header4.png">
<?php
//conexion
$mysqli = new mysqli('localhost', 'root', '','usuarios') or die("<h2>error conexion </h2>");

$name=$_POST['nombreUsuario'];
$nick=$_POST['nickUsuario']; 
$email=$_POST['correoUsuario']; 
$pass=$_POST['contraseñaUsuario']; 
$repass=$_POST['rcontraseñaUsuario'];

if ($mysqli->connect_error) {
    die("Connection fallida: " . $conn->connect_error);
} 



if($pass!=$repass){  
	die("<h2>contarseñas diferents </h2>");
}

$sql = "INSERT INTO datos (id_usuario,NombreCompleto,Nick,Correo,Password)
VALUES ('','$name', '$nick', '$email', '$pass')";

if ($mysqli->query($sql) == TRUE) {
    echo "<h2>Se creo el usuario</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo header("Location:exito.html");
     	
?>
</body>

</html>