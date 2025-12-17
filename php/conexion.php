<?php
// Datos de conexión
$host = "localhost";      // Servidor local
$user = "root";           // Usuario por defecto
$pass = "";               // Contraseña sin configuradar
$db   = "videojuegosdb";  // Nombre de la base de datos

// Crear conexión
$conexion = @new mysqli($host, $user, $pass, $db); 

// Verificar conexión
if ($conexion->connect_error) {
    // Si hay un error, muestra un mensaje descriptivo y termina
    die("Error de conexión: No se pudo conectar a la base de datos '$db'. " . 
        "Revisa si MySQL está activo y si la contraseña es correcta: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>