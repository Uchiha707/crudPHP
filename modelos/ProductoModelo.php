<?php
// Mensaje para verificar que el modelo se carga
print("Modelo");

class ProductoModelo {
    private PDO $conexion;

    // Constructor que establece la conexión a la base de datos
    public function __construct() {
        global $conexion; // Asegúrate de que $conexion esté definida en otro archivo
        $this->conexion = $conexion;
    }

    // Modelo para consultar todos los productos en la BD
    public function obtenerProductos(): array {
        $statement = $this->conexion->query("SELECT * FROM productos");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Modelo para agregar un producto en la BD
    public function agregarProducto(string $nombre, int $stock, float $precio): bool {
        try {
            $statement = $this->conexion->prepare("INSERT INTO productos (nombre, stock, precio) VALUES (?, ?, ?)");
            return $statement->execute([$nombre, $stock, $precio]);
        } catch (PDOException $e) {
            exit("Error al agregar el producto: " . $e->getMessage());
        }
    }

    // Modelo para consultar un producto en la BD por su ID
    public function obtenerProductoPorId(int $id): array {
        $statement = $this->conexion->prepare("SELECT * FROM productos WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Modelo para actualizar un producto en la BD por su ID
    public function actualizarProducto(int $id, string $nombre, int $stock, float $precio): bool {
        try {
            $statement = $this->conexion->prepare("UPDATE productos SET nombre = ?, stock = ?, precio = ? WHERE id = ?");
            return $statement->execute([$nombre, $stock, $precio, $id]);
        } catch (PDOException $e) {
            exit("Error al actualizar el producto: " . $e->getMessage());
        }
    }

    // Modelo para eliminar un producto en la BD por su ID
    public function eliminarProducto(int $id): bool {
        try {
            $statement = $this->conexion->prepare("DELETE FROM productos WHERE id = ?");
            return $statement->execute([$id]);
        } catch (PDOException $e) {
            exit("Error al eliminar el producto: " . $e->getMessage());
        }
    }
}
?>

