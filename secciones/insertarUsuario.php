<?php
include("../config/conexion.php");
include("../clases/usuario.php");


if(isset($_REQUEST['email'])&& isset($_REQUEST['nombre']))
{
  $nombre = $_REQUEST['nombre'];
  $apellido = $_REQUEST['apellido'];
  $email = $_REQUEST['email'];
  $tipo = $_REQUEST['tipo'];
  $provincia = $_REQUEST['provincia'];
  $nombre_distrito = $_REQUEST['nombre_distrito'];
  $telefono = $_REQUEST['telefono'];

  echo($nombre."<br>".$apellido."<br>".$email);

  $datos=new usuario($nombre,$apellido,$email,$tipo,$provincia,$nombre_distrito,$telefono);
  $insercion=$conn->prepare("INSERT INTO usuario (nombre,apellido,email, tipo, provincia, nombre_distrito,telefono)value(:nombre,:apellido,:email,:tipo, :provincia, :nombre_distrito,:telefono)");

  try {
 $insercion->execute((array)$datos);
 
     $msg="Su registro se ha guardado exitosamente";
  }
 catch (PDOException $e) {
    if($e->erroInfo[1]==1062)
    {
     $msg="Correo electrónico ya esta registrado en el sistema";
    }else{
        echo("Otro error");
        $msg="Error al guardar los datos";
    }
}
echo '<meta http-equiv="refresh" content="0; url=insertarUsuario.php?msg='.$msg.'">';
}
else{
    echo"No esta definido";
    echo '<meta http-equiv="refresh" content="0; url=../index.php">';
}

?>