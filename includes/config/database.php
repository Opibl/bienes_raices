<?php 

function conectarDB() {
    // Cadena de conexión: host, puerto, nombre de base de datos, usuario y contraseña
    $conexion = pg_connect("host=localhost port=5433 dbname=bienesraices_crud user=postgres password=pedroignacio0");

    // Verificar si la conexión fue exitosa
    if(!$conexion) {
        echo "Error: No se pudo conectar a la base de datos.";
        exit;
    }

    return $conexion;
}
