<?php
require_once 'configuracion/conexion.php';
require_once 'controladores/ProductoControlador.php';

$controladorProducto = new ProductoControlador();
$controladorProducto->mostrarProductos();

?>