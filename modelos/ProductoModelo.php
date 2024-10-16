<?php
print("Modelo");

class ProductoModelo {
    private PDO $conexion;
    
    public function __construct() {
        global $conexion;
        $this->conexion = $conexion;
    }
    
    public function obtenerProductos(): array {
        $statement = $this->conexion->query("SELECT * FROM productos");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>