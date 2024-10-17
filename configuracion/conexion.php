<?php
// Incluir la configuración de la conexión a la base de datos
include 'configuracion/conexion.php'; // Asegúrate de que esta ruta sea correcta

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $conexion = new PDO($dsn, $username, $password);
    // Configurar el modo de error y el modo de excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexión exitosa<br>";
    
    // Aquí puedes llamar al método para obtener productos y mostrarlos
    $query = "SELECT * FROM productos";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    
    // Verifica si hay productos
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($productos)) {
        echo "No hay productos disponibles.";
    } else {
        foreach ($productos as $producto) {
            echo "ID: " . $producto['id'] . ", Nombre: " . $producto['nombre'] . ", Stock: " . $producto['stock'] . ", Precio: " . $producto['precio'] . "<br>";
        }
    }

} catch (PDOException $e) {
    // Manejo de excepciones: mostrar mensaje de error
    echo "Error de conexión: " . $e->getMessage();
    // Detener la ejecución del script en caso de error de conexión
    die();

}
?>

