
<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location:../login/login-empl.html');
    exit();
}

$username = $_SESSION['username'];
$perfil = $_SESSION['perfil'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
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
      <!-- Este metodo nos lleva atras en el historial
    href="javascript: history.go(-1) -->
    <a href="javascript: history.go(-1)"><img width="50px" height="50px" src="../assets/img/back.png " alt="Atras"></a>
    <h1>Editar Clientes </h1>
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
   $consulta = $DB->consulta("SELECT * FROM cliente;");
while ($resultado = $DB->fetch_array($consulta)){
    $AA=$resultado['id_clie'];
    $BB=$resultado['nombre_clie'];
echo "<option value='$AA'>$BB</option>";
}
    ?>
    </select>
    <input type="submit" name="Btn" value = "Buscar">
</form>
<?php
if (isset ($_POST['Btn'])) {
    $id = $_POST['select1']; 
    $consulta = $DB->consulta("SELECT * FROM cliente WHERE id_clie =".$id.";");
if($DB->num_rows($consulta)>0){
    $resultados = $DB->fetch_array($consulta);
?>
    <form name="EDIT" action="Edit.php" method="post" enctype="multipart/form-data">
    <br>
    <label for="id_clie">ID:</label>
    <input type="number" name="id_clie" value="<?php echo $resultados[0];?>" required>
    <br><br>
    <label for="nomb_clie">Nombre:</label>
    <input type="text" name="nomb_clie" value="<?php echo $resultados[1];?>" required>
    <br><br>
    <label for="dire_clie">Dirección:</label>
    <input type="text" name="dire_clie" value="<?php echo $resultados[2];?>" required>
    <label for="tele_clie">Teléfono:</label>
    <input type="text" name="tele_clie" value="<?php echo $resultados[3];?>" required>
    <label for="gen_clie">Género:</label>
    <input type="text" name="gen_clie" value="<?php echo $resultados[4];?>" required>
    <label for="fena_na">Fecha Nacimiento:</label>
    <input type="text" name="fena_na" value="<?php echo $resultados[5];?>" required>
    <label for="fena_ing">Fecha Ingreso:</label>
    <input type="text" name="fena_ing" value="<?php echo $resultados[6];?>" required>
    <br><br>
    <input type="submit" value="Guardar" name="Btn2">
    
    <input type="hidden" name="select1" value="<?php echo $resultados[0];?>">
</form>

<?php
}}
  if(isset($_POST['Btn2'])){
    
    $ID = $_POST['id_clie'];
    $NC = $_POST['nomb_clie'];
    $NP = $_POST['dire_clie'];
    $DP = $_POST['gen_clie'];
    $PU = $_POST['fena_na'];
    $SK = $_POST['fena_ing'];
    $tel = $_POST['tele_clie'];


    if(isset($_POST['Btn2'])){
     $sqlmodifica = $DB->modifica("UPDATE `cliente` SET `id_clie` = '$ID', `nombre_clie` = '$NC', `dire_clie` = '$NP', `tele_clie` = '$tel', `gene_clie` = '$DP', `fena_clie` = '$PU', `fein_clie` = '$SK' WHERE `cliente`.`id_clie` = $ID ");
        //echo $sqlmodifica;
        ?>
        <script>
            alert("Save Successfully");
        </script>
        <?php
    }
    else{
        $consulta =$DB->consulta("SELECT * FROM cliente WHERE id_clie = $ID");
        if($DB->num_rows($consulta)>0){
            $resultados = $DB->fetch_array($consulta);

            
        }
        if(isset($_POST['Btn2'])){
            $sqlmodifica = $DB->modifica("UPDATE `cliente` SET `id_clie` = '$ID', `nomb_clie` = '$NC', `dire_clie` = '$NP', `fena_na` = '$PU', `fein_clie` = '$SK' WHERE `cliente`.`id_clie` = '$ID'");
        }
    
        ?>
        <script>
            alert("Save Succesfully");
        </script>
        <?php
    }
};?>