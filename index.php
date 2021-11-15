<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action=insertar.php>
<div>
<label for="nombre">Nombre</label>
<input type="text" name="nombre">

</div>

<div>
<label for="apellido">Apellido</label>
<input type="text" name="apellido">
</div>
<div>
<label for="nombre">Email</label>
<input type="email" name="email">
</div>
<div>
<label for="telefono">Telelfono</label>
<input type="text" name="telelfono">
</div>
<div>
<label for="tipo de usuario">tipo de usuario</label>
<select name="tipo de usuario">

<option value="1">Usuario1</option>
<option value="2">Usuario2</option>
<option value="3">Usuario3</option>
<option value="4">Usuario4</option>

</select>
</div>
<div>
<label for="provincia">provincia</label>
<select name="provincia">

<option value="1">Usuario1</option>
<option value="2">Usuario2</option>
<option value="3">Usuario3</option>
<option value="4">Usuario4</option>

</select>
</div>
<div>
<label for="distrito">distrito</label>
<select name="distrito">

<option value="1">Usuario1</option>
<option value="2">Usuario2</option>
<option value="3">Usuario3</option>
<option value="4">Usuario4</option>

</select>

</div>
<button type="submit">Enviar</button>

    </form>    

</body>
</html>
<?php

?>