<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Empleado</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
     <form action="" method="post">
        <h1>Regristar Empleado</h1>
        <input type="number" name="N1" placeholder="Codigo de empleado"required>
        <br><br>
        <input type="text" name="Name" placeholder="Nombre de empleado" required>
        <br><br>
        <input type="number" name="phone" required placeholder="Telefono de empleado">
        <br><br>
        <input type="text" name="Adress" placeholder="Direccion de empleado" required>
        
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
        $tel = $_POST['phone'];
        $Direccion = $_POST['Adress'];
       

        $sqlinsertar = $DB->inserta("insert into empleado values('$id','$nombre','$tel','$Direccion');");
    ?>      
        <script>
            alert("Save Succesfully");
        </script>
    
    
    <?php
        }
    ?>