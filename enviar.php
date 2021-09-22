<?php
$destino="lechuga.lflr@gmail.com";
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$mensaje=$_POST['mensaje'];
$contenido ="Nombre: " . $nombre . "\nCorreo:" . $correo . "\nTelefono:" . $telefono . "\nMensaje:" . $mensaje;
 mail('lechuga.lflr@gmail.com', "Contacto",$contenido);
 header("Location:mensaje.html");
?>