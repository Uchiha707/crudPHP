<?php
// Configuración de la conexión a la base de datos
$dsn = 'mysql:host=localhost;port=3307;dbname=hulk';
$username = 'root';
$password = '';

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $conexion = new PDO($dsn, $username, $password);
    // Configurar el modo de error y el modo de excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Mensaje de conexión exitosa (opcional)
    echo "Conexión exitosa";
} catch (PDOException $e) {
    // Manejo de excepciones: mostrar mensaje de error
    echo "Error de conexión: " . $e->getMessage();
    // Detener la ejecución del script en caso de error de conexión
    die();

}
?>
