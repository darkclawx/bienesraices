<?php
 
function conectarDB(): mysqli{

    $db=mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

 if(!$db){
    echo "Conexion no Exitosa";
    exit;
 } 
    return $db;
}