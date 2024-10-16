<!-- Archivo: Vistas/productoview.php -->
<!-- Propósito: Vista para mostrar la lista de productos -->
<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Productos</title>
</head>
<body>
    <h3>CRUD de Productos</h3>
    <table class="table" border="1" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['precio'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>