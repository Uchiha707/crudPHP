<?php
print("<br>Controlador<br>");

require_once './modelos/ProductoModelo.php';

class ProductoControlador {
    private ProductoModelo $modeloProducto;

    public function __construct() {
        $this->modeloProducto = new ProductoModelo();
    }

    // Controlador para mostrar todos los productos
    public function mostrarProductos() {
        $productos = $this->modeloProducto->obtenerProductos();
        include './vistas/productos_view.php';
    }

    // Controlador para mostrar el formulario de agregar producto
    public function mostrarFormularioAgregarProducto(): void {
        include './Vistas/modaladdproducto.php';
    }

    // Controlador para agregar productos
    public function agregarProducto(): void {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
            $exito = $this->modeloProducto->agregarProducto($nombre, $stock, $precio);
            if ($exito) {
                header("Location: index.php");
                exit();
            } else {
                exit("Error al agregar el producto");
            }
        }
    }

    // Controlador para mostrar el formulario de actualizar producto, con un producto por su ID
    public function mostrarFormularioActualizarProducto(int $id): void {
        $producto = $this->modeloProducto->obtenerProductoPorId($id);
        include './Vistas/modalactualizarproducto.php';
    }

    // Controlador para actualizar producto por su ID
    public function actualizarProducto(): void {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
            $exito = $this->modeloProducto->actualizarProducto($id, $nombre, $stock, $precio);
            if ($exito) {
                header("Location: index.php");
                exit();
            } else {
                exit("Error al actualizar el producto");
            }
        }
    }

    // Controlador para eliminar producto por su ID
    public function eliminarProducto(int $id): void {
        $exito = $this->modeloProducto->eliminarProducto($id);
        if ($exito) {
            header("Location: index.php");
            exit();
        } else {
            exit("Error al eliminar el producto");
        }
    }
}
?>

