<?php
include("config/conexion.php");
include("clases/usuario.php");

$consultaTodos=$conn->query("SELECT u.nombre,
u.apellido,
u.email,
t.nombre_tipo_usuario,
p.nombre_provincia,
d.nombre_distrito
FROM
usuario as u INNER JOIN tipo_usuario as t on u.tipo=t.id_tipo INNER JOIN distrito as d on u.nombre_distrito=d.nombre_distrito
INNER JOIN provincia AS p ON u.provincia=p.id_provincia");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<form method="post" action=insertarUsuario.php>
<p><?php if(isset($_GET['msg'])) echo $_GET['msg'];?></p>

<div class="mb-3">
<label for="nombre">Nombre</label>
<input type="text" name="nombre">

</div>

<div class="mb-3">
<label for="apellido">Apellido</label>
<input type="text" name="apellido">
</div>
<div class="mb-3">
<label for="nombre">Email</label>
<input type="email" name="email">
</div>
<div class="mb-3">
<label for="telefono">Telelfono</label>
<input type="text" name="telelfono">
</div>
<div class="mb-3">
<select class="form-select" aria-label="Default select example">

<?php
global $conn;
$sql = "SELECT * FROM tipo_usuario";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
if ($stmt->rowCount() > 0) { ?>
<?php foreach ($results as $row){ ?>
<option value="<?php echo $row['id_tipo']; ?>"><?php echo $row['nombre_tipo_usuario']; ?></option>   
<?php } ?>
<?php }?>
</select>

</div>
 



<button type="submit">Enviar</button>
</form>  

<table>
  
<?php 
while($detalleUsuario=$consultaTodos->fetch(PDO::FETCH_OBJ)){?>
<tr>
    <td><?php echo $detalleUsuario->nombre; ?></td>
    <td><?php echo $detalleUsuario->apellido; ?></td>
    <td><?php echo $detalleUsuario->email; ?></td>
    <td><?php echo $detalleUsuario->nombre_tipo_usuario; ?></td>
    <td><?php echo $detalleUsuario->nombre_provincia; ?></td>
    <td><?php echo $detalleUsuario->nombre_distrito; ?></td>
<?php } ?>
</tr>
</table>
  
</body>
</html>