<?php
require_once 'configuracion/conexion.php';
require_once 'controladores/ProductoControlador.php';


$controladorProducto = new ProductoControlador();
// Acciones GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $accion = $_GET['accion'] ?? ''; // Verifica si la acción está presente en GET
    
    switch ($accion) {
        case 'modalAdd':
            include './vistas/modaladdproducto.php';
            break;
    
    
    }
    
    
    $controladorProducto->mostrarProductos(); // Muestra productos por defecto
}
// Acciones POST
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accion = $_POST['accion'] ?? ''; // Verifica si la acción está presente en POST
    
    switch ($accion) {
        case 'agregar_producto':
            $controladorProducto->agregarProducto(); // Método para agregar un producto
            break;
    
    }
    
    header("Location: index.php"); // Redirecciona después de procesar POST
    exit();
}

// Redireccionamiento por defecto si no es GET ni POST
else {
    header("Location: index.php");
    exit();
}
?>