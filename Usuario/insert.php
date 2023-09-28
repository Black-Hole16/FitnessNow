<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location:../login/login-empl.html');
    exit();
}

$username = $_SESSION['username'];
$perfil = $_SESSION['perfil'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuario</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <iframe src="../menu.html" frameborder="0" width="100%" scrolling="no" height="100%"></iframe>
    <a href="javascript:history.go(-1)"><img width="50px" height="50px" src="../assets/img/back.png" alt="Atras"></a>
     <form action="" method="post">
        <h1>Regristarse</h1>
        <input type="number" name="N1" placeholder="Codigo de usuario"required>
        <br><br>
        <input type="text" name="Name" placeholder="Nombre de usuario" required>
        <br><br>
        <input type="password" name="Adress" placeholder="Contraseña" required>
        <br><br>
        <select name="rol">
            <option value="Selecionar">Selecionar</option>
            <option value="Administrador">Administrador</option>
            <option value="Cajero">Cajero</option>
            <option value="Vendedor">Vendedor</option>
        </select>
        <br><br>
        <input type="submit" value="Guardar" name="Btn">
     </form>
</body>
</html>

    <?php
        if (isset($_POST['Btn'])) {
        include("../conec.php");
        $DB = new mysql();
        $id = $_POST['N1']; $nombre = $_POST['Name'];
        $Direccion = $_POST['Adress']; $Rol = $_POST['rol'];

        $sqlinsertar = $DB->inserta("insert into usuario values('$id','$nombre','$Direccion','$Rol');");
    ?>      
        <script>
            alert("Save Succesfully");
        </script>
    
    
    <?php
        }
    ?>