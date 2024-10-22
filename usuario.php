<?php

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Crear un email y password
$email = "correo@correo.com";
$password = "123456";

// Hashear el password con BCRYPT
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

// Agregarlo a la base de datos
$resultado = pg_query($db, $query);

if($resultado) {
    echo "Usuario creado correctamente";
} else {
    echo "Error al crear usuario";
}

?>
