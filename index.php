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

<?php
require_once 'configuracion/conexion.php';
require_once 'controladores/ProductoControlador.php';


$controladorProducto = new ProductoControlador();

// Acciones GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $accion = $_GET['accion'] ?? '';
    switch ($accion) {
        case 'modalAdd':
            include './vistas/modaladdproducto.php';
            break;

        case 'modalActualizar':
            if (isset($_GET['id'])) {
                $controladorProducto->mostrarFormularioActualizarProducto($_GET['id']);
            }
            break;
    }
    $controladorProducto->mostrarProductos(); // Muestra productos por defecto
}

// Acciones POST
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accion = $_POST['accion'] ?? '';
    switch ($accion) {
        case 'agregar_producto':
            $controladorProducto->agregarProducto(); // Método para agregar un producto
            break;

        case 'actualizar_producto':
            $controladorProducto->actualizarProducto(); // Método para actualizar un producto
            break;

        case 'eliminar_producto':
            if (isset($_POST['id'])) {
                $controladorProducto->eliminarProducto($_POST['id']); // Método para eliminar un producto
            }
            break;
    }

    header("Location: index.php");
    exit();
}

// Redireccionamiento por defecto
else {
    header("Location: index.php");
    exit();
}
?>

<!-- Inclusión de estilos -->
<link rel="stylesheet" href="publico/estilos.css">
<link rel="stylesheet" href="publico/estilosA.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
