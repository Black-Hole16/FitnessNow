
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
    <title>Modificar Usuario</title>
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
    <h1>Editar Usuarios</h1>
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
   $consulta = $DB->consulta("SELECT * FROM usuario;");
while ($resultado = $DB->fetch_array($consulta)){
    $AA=$resultado['codi_usua'];
    $BB=$resultado['nomb_usua'];
echo "<option value='$AA'>$BB</option>";
}
    ?>
    </select>
    <input type="submit" name="Btn" value = "Buscar">
</form>
<?php
if (isset ($_POST['Btn'])) {
    $id = $_POST['select1'];
    $consulta = $DB->consulta("SELECT * FROM usuario WHERE codi_usua =".$id.";");
if($DB->num_rows($consulta)>0){
    $resultados = $DB->fetch_array($consulta);
?>
<form name="EDIT" action="Edit.php" method="post" enctype = "multipart/form-data">
    <br>
    <input type="number" name="N1" value="<?php echo $resultados[0];?>" required>
    <br><br>
    <input type = "text" name="NU" value="<?php echo $resultados[1];?>" required>
    <br><br>
    <input type = "text" name="pass" value="<?php echo $resultados[2];?>" required>
    <input type = "text" name="rol" value="<?php echo $resultados[3];?>" required>
    <br><br>
    <input type="submit" value="Guardar" name="Btn2">
    
    <input type= hidden name="select1" value="<?php echo $resultados[0];?>">

</from>
<?php
}}
  if(isset($_POST['Btn2'])){
    

    $id = $_POST['N1'];
    $NP = $_POST['NU'];
    $DP = $_POST['pass'];
    $PU = $_POST['Rol'];


    if($img <>"imag_prod/"){
     $sqlmodifica = $DB->modifica("UPDATE `usuario` SET `codi_usua` = '$id', `nomb_usua` = '$NP', `cont_usua` = '$DP', `rol_usua` = '$PU' WHERE `usuario`.`codi_usua` = $select;");
        //echo $sqlmodifica;
        ?>
        <script>
            alert("Save Successfully");
        </script>
        <?php
    }
    else{
        $consulta =$DB->consulta("SELECT * FROM usuario WHERE codi_usua = $id");
        if($DB->num_rows($consulta)>0){
            $resultados = $DB->fetch_array($consulta);

            
        }
        if($img <>"imag_prod/"){
            $sqlmodifica = $DB->modifica("UPDATE `usuario` SET `codi_usua` = '$id', `nomb_usua` = '$NP', `cont_usua` = '$DP', `rol_usua` = '$PU' WHERE `producto`.`codi_prod` = $select;");
        }
    
        ?>
        <script>
            alert("Save Succesfully");
        </script>
        <?php
    }
};?>