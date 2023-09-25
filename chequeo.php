<?php
session_start();                                     //sesion iniciada
  
$usu = $_POST['u'];                                  //variable usu igual elemento enviado u
$cont = $_POST['c'];  

 include("conec.php");

  $DB = new mysql();
 $consulta = $DB->consulta("SELECT * FROM `usuario` WHERE `nomb_usua`='$usu' and `cont_usua`='$cont';");
//echo "SELECT * FROM `usuario` WHERE `nomb_usua`='$usu' and `cont_usua`='$cont';";


 if($DB->num_rows($consulta)>0){

while($resultados = $DB->fetch_array($consulta)){



$codigo = $resultados[0];
$nombre = $resultados[1];
$contra = $resultados[2];
$perfil = $resultados[3];






$usuarios = array(                                   //vector usuarios
  array("nombre" => "$nombre", "contraseña" => "$contra"),  //campo nombre dato luis...
                                                     // Agregar más usuarios aquí
                 );                                  //cerrar vector

$usu = $_POST['u'];                                  //variable usu igual elemento enviado u
$cont = $_POST['c'];                                 //variable cont igual elemento enviado c
$loggedIn = false;                                   //variable loggedIn desactivada

foreach ($usuarios as $us) {                         //para cada elemento del vector a us
if ($usu == $us['nombre'] && $cont == $us['contraseña']) {   //comparar vector con datos
$loggedIn = true;                                            //variable loggedIn desactivada
break;                                                       //detiene accion
      }                                                      //cierra if
      }                                                      //cierra foreach

if ($loggedIn) {                                            //si variable loggedIn esta activa 
$_SESSION['perfil'] = $perfil;                                      
$_SESSION['username'] = $usu;                              //variable de session username igual usu
                        

if ($perfil == 'administrador') {   //comparar vector con datos
header("Location: Admin.html");                             
}else{

if ($perfil == 'Cajero') {   //comparar vector con datos
header("Location: home-product.html");  
                               
}else{
 
if ($perfil == 'cajero') {   //comparar vector con datos
header("Location: home-product.html");    
                               
} 
}   } 

};

};

}else{ echo "Usuario o contraseña incorrectos. <a href='login.html'target='_parent'>Volver a intentar</a>";  
 }
?>


