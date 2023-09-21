<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Cliente</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
     <form action="" method="post">
        <h1>Regristar Cliente</h1>
        <input type="number" name="N1" placeholder="identificación"required>
        <br><br>
        <input type="text" name="Name" placeholder="Nombre" required>
        <br><br>
        <input type="text" name="Adress" placeholder="Direccion" required>
        <br><br>
        <input type="number" name="phone" required placeholder="Telefono">
        <br><br>
        <select name="gen">
            <option value="x">Selecionar</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="n/a">No aplica</option>
        </select>
        <br><br>
        <input type="date" name="Fecha_NA">
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
        $Direccion = $_POST['Adress']; $tel = $_POST['phone'];
        $Gen = $_POST['gen']; $Date = $_POST['Fecha_NA'];

        $sqlinsertar = $DB->inserta("insert into cliente values('$id','$nombre','$Direccion','$tel','$Gen','$Date');");
        
    ?>      
        <script>
            alert("Save Succesfully");
        </script>
    
    
    <?php
        }
    ?>