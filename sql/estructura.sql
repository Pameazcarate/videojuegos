-- Crear base de datos y tabla principal
CREATE DATABASE IF NOT EXISTS videojuegosdb;
USE videojuegosdb;

-- Tabla: videojuegos
DROP TABLE IF EXISTS videojuegos;
CREATE TABLE videojuegos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  genero VARCHAR(50) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  anio INT NOT NULL,
  calificacion DECIMAL(3,1) NOT NULL
);