
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
    <title> Catalogo</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Estilos generales para la tabla */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th, td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center; /* Centra el texto en todas las celdas */
}

th {
  background-color: #4CAF50; /* Color de fondo para los encabezados */
  color: white; /* Color de texto para los encabezados */
}

/* Media query para pantallas pequeñas (max-width 600px) */
@media (max-width: 600px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  
  th {
    display: none; /* Oculta los encabezados en pantallas pequeñas */
  }
  
  tr {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    background-color: #f2f2f2; /* Color de fondo para filas en pantallas pequeñas */
  }
  
  td {
    /* Añade un espacio a la izquierda para separar las celdas */
    padding-left: 10px;
    text-align: left; /* Alinea el texto a la izquierda en pantallas pequeñas */
  }
}
    </style>
</head>
<body>
    <iframe src="../menu.html" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
    <h1>Nuestros Productos</h1>
    <!-- Este metodo nos lleva atras en el historial
    href="javascript: history.go(-1) -->
    <a href="javascript: history.go(-1)"><img width="50px" height="50px" src="../assets/img/back.png " alt="Atras"></a>
</body>
</html>
<?php
include("../conec.php");
        $DB = new MySQL();

        

        $consulta = $DB->consulta("SELECT * FROM producto;");
        if($DB->num_rows($consulta)>0){
            echo "<html><table align=center border=1 cellpading=3<tr>";
            # Costruye los encabezados
            echo "
            <th width='149'>Codigo</th>
            <th width='211'>Nombre</th>
            <th width='211'>Descripción</th>
            <th width='145'>Precio Und</th>
            <th width='138'>Presentación</th>
            <th width='138'>Imagen</th>
            </tr>
            ";
            while($resultado = $DB->fetch_array($consulta)){
                // Mostrmos los datos en en celdas de la tabla html
                echo "<tr>";
                echo "<td>".$resultado[0]."</td>";
                echo "<td>".$resultado[1]."</td>";
                echo "<td>".$resultado[2]."</td>";
                echo "<td>".$resultado[3]."</td>";
                echo "<td>".$resultado[4]."</td>";
                echo "<td><img src='".$resultado[5]."'width='100' height='100'></td>";
                echo "</tr>";
            };

            echo "</table>";
            
        };    
?>

