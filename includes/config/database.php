<?php 

function conectarDB() {
    // Cadena de conexión: host, puerto, nombre de base de datos, usuario y contraseña
    $conexion = pg_connect("host=localhost port=5432 dbname=bienesraices_crud user=postgres password=x-xx-x");

    // Verificar si la conexión fue exitosa
    if(!$conexion) {
        echo "Error: No se pudo conectar a la base de datos.";
        exit;
    }

    return $conexion;
}
