<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regristro de Producto</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
     <iframe src="../menu.html" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
      <!-- Este metodo nos lleva atras en el historial
    href="javascript: history.go(-1) -->
    <a href="javascript: history.go(-1)"><img width="50px" height="50px" src="../assets/img/back.png " alt="Atras"></a>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Regristar Producto</h1>
        <input type="number" name="N1" placeholder="Codigo de Producto" required>
        <br><br>
        <input type="text" name="Name-prod" placeholder="Nombre del producto" required>
        <br><br>
        <input type="text" name="des-prod" placeholder="Descripcion" required>
        <br><br>
        <input type="number" name="Precio-und" placeholder="$ Precio unitario" required>
        <br><br>
        <input type="text" name="Presentacion-prod" placeholder="Presentacion producto" required>
        <br><br>
        <input type="file" name="imag-prod" placeholder="Imagen de producto">
        <br><br>
        <input type="submit" value="Guardar" name="Btn">
</form>
</body>
</html>

<?php


include("../conec.php");
$DB = new mysql();

if (isset($_POST['Btn'])) {
        
        
// Cambia "Carpeta_destino" Guardar los archivos
$car_imag = "imag_prod/"; 
$cargado = 1; 
        
$archi_enviado = $car_imag. basename($_FILES["imag-prod"]["name"]);

// Verificar si el archivo ya existe
if (file_exists($archi_enviado)) {
    echo "El archivo ya existe.<br>";
    $cargado=0;
}

if ($cargado ==0) {
    echo "El archivo no fue subido.<br>";
} else {
    if(move_uploaded_file($_FILES["imag-prod"]["tmp_name"], $archi_enviado)){
        echo "El archivo ". basename($_FILES["imag-prod"]["name"]). "<br> se ha sido subido correctamente.";
    }
    else{
        echo "Hubo un error al el archivo.<br>";
    }
}
        
        $id = $_POST['N1']; 
        $NP = $_POST['Name-prod'];
        $DP= $_POST['des-prod']; 
        $PU= $_POST['Precio-und'];
        $PR= $_POST['Presentacion-prod'];
        $img = $archi_enviado;

        $sqlinserta = $DB->inserta("insert into producto values('$id','$NP','$DP','$PU','$PR','$img');");
    ?>      
        <script>
            alert("Save Succesfully");
        </script>
    
    
    <?php
        }
    ?>