
<!DOCTYPE HTML>
<html>
<head>
<title>Crear Usuario</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta charset="utf-8">
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <link rel="stylesheet" href="../vistas/css/sigin.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
      $(document).ready(function() {
    M.updateTextFields();
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems, options);
  });


  // Or with jQuery

  $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      },
    });
  });
  function ComprobarClave() {
clave1= document.formulario.password1.value
  clave2 = document.formulario.password2.value
    if (clave1 !=clave2) {
      alert('Las contraseñas son diferentes')
    return false;
    }
  }
       
      </script>

</head>
<body class="text-center">
  <div class="text-center"> <p>Prueba de Login</p></div>
<div class="container">
<div class="row ">
<br>
    <form onsubmit="ComprobarClave()" name="formulario"class="col s12 m12 l12" method="GET" action="procesarUsuario.php">
        <di> <h5 class="h6 text center">Crear Usuario</h5>
<p><?php if(isset($_GET['msg'])) echo $_GET['msg'];?></p>
     <div class="row-input">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
            <input type="text" id="autocomplete-input" class="validate autocomplete" name="nombre">
            <label for="autocomplete-input">Introduzca su nombre</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
            <input type="text" id="apellido" class=" validate autocomplete" name="apellido">
            <label for="apellido">Introduzca su apellido</label>
        </div>
      
         <div class="input-field col s12"> 
         <i class="material-icons prefix">email</i> 
         <input placeholder="prueba@ejemplo.com" type="email" class="autocomplete active validate" id="email"  name="email" >
         <label for="email">Correo Electronico</label> 
         </div>
         <div class="input-field col s12"> 
         <i class="material-icons prefix">security</i> 
         <input type="password" class="validate" id="password1" name="password1" >
         <label for="password1">Contraseña</label>
         </div>  
         <div class="input-field col s12"> 
         <i class="material-icons  prefix">security</i> 
         <input type="password" class="validate autocomplete" id="password2" name="password2" >
         <label for="password2">Repetir contraseña</label>
        </div>
        </div>
        <div class="button">
        <center><button class="btn waves-effect waves-light blue darken-4" type="submit" onClick="ComprobarClave()" name="action">Crear Usuario
    <i class="material-icons right">account_circle</i>
  </button> 
        </div>
 
  <div> ¿Ya tiene cuenta?<a href="../index.php"> Acceder al sistema</a> 
  <a href="https://api.whatsapp.com/send?phone=+50761439504"
  class="btn-wsp" target="_blank">
  <i class="fa fa-whatsapp icon"></i>
  <img class="btn-wsp" src="../imagenes/wsp.png" alt="Whatsapp">
</a>
</div>
    </form>
 </div>
 </div>

        
</body>
</html