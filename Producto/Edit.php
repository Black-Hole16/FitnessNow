<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <style>
        *{
            text-align:center;
        }
        table{
            margin:auto;
        }
    </style>
</head>
<body> 
     <iframe src="../menu.html" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
     <a href="../home-product.html"><img width="50px" height="50px" src="../assets/img/back.png " alt="Atras"></a>
    <h1>Editar Productos</h1>
</body>
</html>
<?php
include("../conec.php");
$DB = new MySQL();
?>
<form name="Buscar" action="edit.php" method=post>
    <select name ="select1">
    <option></option>
<?php
   $consulta = $DB->consulta("SELECT * FROM producto;");
while ($resultado = $DB->fetch_array($consulta)){
    $AA=$resultado['codi_prod'];
    $BB=$resultado['nomb_prod'];
echo "<option value='$AA'>$BB</option>";
}
    ?>
    </select>
    <input type="submit" name="Btn" value = "Buscar">
</form>
<?php
if (isset ($_POST['Btn'])) {
    $id = $_POST['select1'];
    $consulta = $DB->consulta("SELECT * FROM producto WHERE codi_prod =".$id.";");
if($DB->num_rows($consulta)>0){
    $resultados = $DB->fetch_array($consulta);
?>
<form name="EDIT" action="Edit.php" method="post" enctype = "multipart/form-data">
    <br>
    <input type="number" name="N1" value="<?php echo $resultados[0];?>" required>
    <br><br>
    <input type = "text" name="Name-prod" value="<?php echo $resultados[1];?>" required>
    <br><br>
    <input type = "text" name="des-prod" value="<?php echo $resultados[2];?>" required>
    <input type = "number" name="Precio-und" value="<?php echo $resultados[3];?>" required>
    <input type = "text" name="Pres-prod" value="<?php echo $resultados[4];?>" required>
    <br><br>
    <input type = "file" name="imag-prod" value="<?php echo $resultados[5]."'width = '100' heigth = '100'>";?>">
    <br><br>
    <table border=1><tr><td><img src="<?php echo $resultados[5];?>" width='100' heigth='100'></td></tr></table> <br>
    <input type="submit" value="Guardar" name="Btn2">
    
    <input type= hidden name="select1" value="<?php echo $resultados[0];?>">

</from>
<?php
}}
  if(isset($_POST['Btn2'])){
    $car_imag = "imag_prod/" ; 
    $cargado = 1;

    $archi_enviado = $car_imag.basename($_FILES["imag-prod"]["name"]);

    if(file_exists($archi_enviado)){
        echo "El archivo ya existe.<br>";
        $cargado = 0 ;
    }
    if($cargado==0){
        echo "el Archivo no  fue subido.<br>";
    }else{
        if(move_uploaded_file($_FILES["imag-prod"]["tmp_name"],$archi_enviado)){
            echo "El archivo".basename($_FILES["imag-prod"]["name"])."<br> ha sido subido correctamente.";
        }else{
        echo "Hubo un error al subir tu archivo.<br>";
        }
    }

    $id = $_POST['N1'];
    $NP = $_POST['Name-prod'];
    $DP = $_POST['des-prod'];
    $PR = $_POST['Pres-prod'];
    $img = $archi_enviado;
    $select = $_POST['select1'];
    $PU = $_POST['Precio-und'];


    if($img <>"imag_prod/"){
     $sqlmodifica = $DB->modifica("UPDATE `producto` SET `codi_prod` = '$id', `nomb_prod` = '$NP', `desc_prod` = '$DP', `prun_prod` = '$PU', `pres_prod` = '$PR', `img-prod` = '$img' WHERE `producto`.`codi_prod` = $select;");
        //echo $sqlmodifica;
        ?>
        <script>
            alert("Save Successfully");
        </script>
        <?php
    }
    else{
        $consulta =$DB->consulta("SELECT * FROM producto WHERE codi_prod = $id");
        if($DB->num_rows($consulta)>0){
            $resultados = $DB->fetch_array($consulta);

            $img = $resultados['5'];
        }
        if($img <>"imag_prod/"){
            $sqlmodifica = $DB->modifica("UPDATE `producto` SET `codi_prod` = '$id', `nomb_prod` = '$NP', `desc_prod` = '$DP', `prun_prod` = '$PU', `pres_prod` = '$PR', `img-prod` = '$img' WHERE `producto`.`codi_prod` = $select;");
        }
    
        ?>
        <script>
            alert("Save Succesfully");
        </script>
        <?php
    }
};?>