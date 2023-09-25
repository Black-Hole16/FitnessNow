<?php
session_start(); 
session_destroy();
session_commit();

date_default_timezone_set('America/Bogota');
$hoy = date("d/m/Y");
$hora = date('h:i:s');

?>
<html>
<head> <title>Página Cerrar Sesion</title> </head>
 <style>
        body {  background-image: url('fondo.jpg');
                background-repeat: no-repeat;
                background-position: center;
                background-color:#00ff00;
                background-size: contain;  }
    .div-1 {    background-color: #EBEBEB; }
    .div-2 {  	background-color: #ABBAEA; }
</style>
</head>
<body>
<div class="div-1">
 <h4> Sesion Finalizada |  
      Fecha: <?php echo $hoy;?>  |  
      Hora: <?php echo $hora;?>   |
      <a href="session.PHP">Iniciar Sesion.</a>.
</h4>
   </div>
    <!-- Aquí puedes mostrar el contenido de la página de inicio -->
</body>
</html>