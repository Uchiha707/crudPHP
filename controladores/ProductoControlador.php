<?php
print("<br>Controlador<br>");

require_once './modelos/ProductoModelo.php';

class ProductoControlador {
    private ProductoModelo $modeloProducto;
    
    public function __construct() {
        $this->modeloProducto = new ProductoModelo();
    }
    
    public function mostrarProductos() {
        $productos = $this->modeloProducto->obtenerProductos();
        include './vistas/productos_view.php';
    }
}
?>