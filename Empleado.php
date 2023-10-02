<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location:login/login-empl.html');
    exit();
}

$username = $_SESSION['username'];
$perfil = $_SESSION['perfil'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Inicio Productos</title>
</head>
<body>
    <iframe src="menu.html" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
    <nav>
      <h2>Bienvindo a FitnessNow elija una opcion para continuar</h2>
  <ul class="menu">
    <li><a href="Producto/consultar.php"><img src="assets/img/inventory.png" alt="Inventario"><figcaption>Inventario</figcaption></a></li>
    
    <li><a href="Producto/insert.php"><img src="assets/img/open-box.png" alt="Ingresar Producto"><figcaption>Regristar Ingreso</figcaption></a></li>
    
    <li><a href="Cliente/insert.php"><img src="assets/img/proveedor.png" alt="proveedor"><figcaption>Cliente</figcaption></a></li>
    <li><a href="Usuario/insert.php"><img src="assets/img/agregar-usuario.png" alt="Agregar Usuario"><figcaption>Agregar Usuario</figcaption></a></li>
    
    <li><a href="Usuario/consultar.php"><img src="assets/img/user-search.png" alt="proveedor"><figcaption>Consulta Usuario</figcaption></a></li>
    
  
  </ul>
  
</nav>
</body>
</html>
