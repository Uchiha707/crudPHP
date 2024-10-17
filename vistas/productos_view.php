<!-- Archivo: Vistas/productoview.php -->
<!-- Propósito: Vista para mostrar la lista de productos -->
<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Productos</title>
</head>
<body>
    <h3>CRUD de Productos</h3>
    <a href="index.php?accion=modalAdd">Agregar Producto ➕📁</a>
    <input type="text" id="inputBusqueda" placeholder="Buscar por nombre" onkeyup="filtrarProductos()">

    <table class="table" border="1" id="tablaProductos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['precio'] ?></td>
                    <td>
                        <a href="index.php?accion=modalActualizar&id=<?= $producto['id'] ?>">✏️</a>
                        <a href="index.php?accion=eliminarProducto&id=<?= $producto['id'] ?>">🚮</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="./Publico/script.js"></script>
</body>
</html>

