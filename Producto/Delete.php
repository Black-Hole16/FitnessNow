<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
     <iframe src="../menu.html" frameborder="0" width="100%" scrolling="no" height="100%"></iframe>
      <!-- Este metodo nos lleva atras en el historial
    href="javascript: history.go(-1) -->
    <a href="javascript: history.go(-1)"><img width="50px" height="50px" src="../assets/img/back.png " alt="Atras"></a>
     <form action="" method="post">
        <h1>Eliminar Producto</h1>
        <input type="number" name="N1" placeholder="Codigo de producto" required>
        <br><br>
        <input type="submit" value="Eliminar" name="Btn">
     </form>
</body>
</html>

    <?php
        if (isset($_POST['Btn'])) {
        include("../conec.php");
        $DB = new mysql();
        $id = $_POST['N1']; 
        $sqlelimina = $DB->elimina("DELETE FROM producto WHERE `producto`.`codi_prod`=". $id.";");
        
    ?>      
        <script>
            alert("Record deleted Succesfully");
        </script>
    
    
    <?php
        }
    ?>