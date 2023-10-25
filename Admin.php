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
    <li><a href="Producto/Edit.php"><img src="assets/img/edit.png" alt="Editar"><figcaption>Editar Inventario</figcaption></a></li>
    <li><a href="Producto/insert.php"><img src="assets/img/open-box.png" alt="Ingresar Producto"><figcaption>Regristar Ingreso</figcaption></a></li>
    <li><a href="Producto/Delete.php"><img src="assets/img/borrar.png" alt="Eliminar Producto"><figcaption>Eliminar Producto</figcaption></a></li>
    <li><a href="Usuario/insert.php"><img src="assets/img/agregar-usuario.png" alt="Agregar Usuario"><figcaption>Agregar Usuario</figcaption></a></li>
    <li><a href="Usuario/Delete.php"><img src="assets/img/delete-user.png" alt="Eliminar usuario"><figcaption> Eliminar Usuario</figcaption></a></li>
    <li><a href="Usuario/consultar.php"><img src="assets/img/user-search.png" alt="consultarusario"><figcaption>Consulta Usuario</figcaption></a></li>
    <li><a href="Usuario/edit.php"><img src="assets/img/editar-usuaria.png" alt="editar usuario"><figcaption>Editar Usuario</figcaption></a></li>
    <li><a href="Empleado/insert.php"><img src="assets/img/tarjeta-de-empleado.png" alt="agrear empleado"><figcaption>agregar empleado</figcaption></a></li>
    <li><a href="Empleado/consultar.php"><img src="assets/img/consul-empleado.png" alt="Consultar empleado"><figcaption>Consultar empleado</figcaption></a></li>
    <li><a href="Empleado/edit.php"><img src="assets/img/edit-empleado.png" alt="Editar empleado"><figcaption>Editar empleado</figcaption></a></li>
    <li><a href="Empleado/Delete.php"><img src="assets/img/delete-empleado.png" alt="Borrar empleado"><figcaption>Borrar empleado</figcaption></a></li>
    <li><a href="cliente/edit.php"><img src="assets/img/lapiz.png" alt="Editar cliente"><figcaption>Editar cliente</figcaption></a></li>
    <li><a href="cliente/consultar.php"><img src="assets/img/lupa.png" alt="consutar cliente"><figcaption>consultar cliente</figcaption></a></li>
    <li><a href="cliente/delete.php"><img src="assets/img/borrar2.png" alt="borrar cliente"><figcaption>borrar cliente</figcaption></a></li>
    <li><a href="cliente/insert.php"><img src="assets/img/agregar.png" alt="insertar cliente"><figcaption>insertar cliente</figcaption></a></li>
  
  </ul>
</nav>
</body>
</html>
