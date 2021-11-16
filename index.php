<?php
include("config/conexion.php");
include("clases/usuario.php");

$consultaTodos=$conn->query("SELECT u.nombre,
u.apellido,
u.email,
u.telefono,
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
<div class="container">
<form  class="row g-3" method="post" action="secciones/insertarUsuario.php">
<p><?php if(isset($_GET['msg'])) echo $_GET['msg'];?></p>

<div class="mb-3">
<label for="nombre"  class="col-sm-2 col-form-label" >Nombre</label>
<input type="text" name="nombre">
</div>

<div class="mb-3">
<label for="apellido"  class="col-sm-2 col-form-label" >Apellido</label>
<input type="text"  name="apellido">
</div>
<div class="mb-3">

<label for="email"  class="col-sm-2 col-form-label" >Email</label>
<input type="email" name="email">
</div>
<div class="mb-3">
<label for="telefono" class="col-sm-2 col-form-label">Telelfono</label>
<input type="text"  name="telelfono">
</div>


<div class="col-md-4">
<label for="tipo" class="form-label">Tipo de usuario</label>
<select name="tipo" class="form-select" aria-label="Default select example">

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


<label for="provincia" class="form-label">Provincias de Panamá</label>
<select name="provincia" class="form-select" aria-label="Default select example">

<?php
global $conn;
$sql = "SELECT * FROM provincia";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); 

if ($stmt->rowCount() > 0) { ?>
<?php foreach ($results as $row){ ?>
<option value="<?php echo $row['id_provincia']; ?>"><?php echo $row['id_provincia']; ?> - <?php echo $row['nombre_provincia']; ?></option>   
<?php } ?>
<?php }?>
</select>




<label for="nombre_distrito" class="form-label">Distritos</label>
<select name="nombre_distrito" class="form-select" aria-label="Default select example">




<?php
global $conn;
$sql = "SELECT u.id_provincia, d.nombre_distrito from provincia as u INNER JOIN distrito as d on u.id_provincia=d.id_provincia";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
if ($stmt->rowCount() > 0) { ?>
<?php foreach ($results as $row){ ?>
<option value="<?php echo $row['nombre_distrito']; ?>"><?php echo $row['id_provincia']; ?> - <?php echo $row['nombre_distrito']; ?></option>   
<?php } ?>
<?php }?>
</select>

</div>
<div class=" button mb-3">
<button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>  
</div>
<table class="table table-hover table table-borderless ">
  


  <thead>
    <tr>

      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">telefono</th>
      <th scope="col">Tipo de usuario</th>
      <th scope="col">Provincia</th>
      <th scope="col">Distrito</th>
      <?php while($detalleUsuario=$consultaTodos->fetch(PDO::FETCH_OBJ)){?>
      </tr>
 

  </thead>
  <tbody>


  <td><?php echo $detalleUsuario->nombre; ?></td>
    <td><?php echo $detalleUsuario->apellido; ?></td>
    <td><?php echo $detalleUsuario->email; ?></td>
    <td><?php echo $detalleUsuario->telefono; ?></td>
    <td><?php echo $detalleUsuario->nombre_tipo_usuario; ?></td>
    <td><?php echo $detalleUsuario->nombre_provincia; ?></td>
    <td><?php echo $detalleUsuario->nombre_distrito; ?></td>
<?php } ?>
</tbody>
</table>
  
</body>
</html>
