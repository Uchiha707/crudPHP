<?php

// Asignación de Variables
$dsn = 'mysql:host=localhost;port=3306;dbname=hulk';
$username = 'root';
$password = '';

try {
   
    $conexion = new PDO($dsn, $username, $password);
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexion exitosa";

} catch (PDOException $e) {
    echo "Error de conexion a la BD".$e->getmessage();
    die();

}
?>
