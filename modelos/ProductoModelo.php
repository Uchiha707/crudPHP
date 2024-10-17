<?php
print("Modelo");

class ProductoModelo {
    private PDO $conexion;
    
    public function __construct() {
        global $conexion;
        $this->conexion = $conexion;
    }
    
    // Modelo para consultar productos en la BD
    public function obtenerProductos(): array {
        $statement = $this->conexion->query("SELECT * FROM productos");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

// Modelo para agregar productos en la BD
public function agregarProducto(string $nombre, int $stock, float $precio): bool {
    try {
        $statement = $this->conexion->prepare("INSERT INTO productos (nombre, stock, precio) VALUES (?, ?, ?)");
        return $statement->execute([$nombre, $stock, $precio]);
    } catch (PDOException $e) {
        exit("Error al agregar el producto: " . $e->getMessage());
    }
} 

}

?>