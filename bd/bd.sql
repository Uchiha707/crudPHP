-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS `hulk`;
-- Usar la base de datos
USE `hulk`;
-- Crear la tabla de productos
CREATE TABLE IF NOT EXISTS `productos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `stock` INT NOT NULL,
    `precio` DECIMAL(10, 2) NOT NULL
);
-- Insertar datos de ejemplo (opcional)
INSERT INTO `productos` (`nombre`, `stock`, `precio`) VALUES
('Producto 1', 10, 19.99),
('Producto 2', 5, 29.99),
('Producto 3', 20, 9.99);