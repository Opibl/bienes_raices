<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
        exit;
    }

    // Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consultar
    $query = "SELECT * FROM propiedades WHERE id = $1";
    $stmt = pg_prepare($db, "get_property", $query);
    $resultado = pg_execute($db, "get_property", array($id));

    if(pg_num_rows($resultado) === 0) {
        header('Location: /');
        exit;
    } 

    $propiedad = pg_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo htmlspecialchars($propiedad['titulo']); ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo htmlspecialchars($propiedad['imagen']); ?>" alt="imagen de la propiedad">

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo htmlspecialchars($propiedad['precio']); ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo htmlspecialchars($propiedad['wc']); ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo htmlspecialchars($propiedad['estacionamiento']); ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                <p><?php echo htmlspecialchars($propiedad['habitaciones']); ?></p>
            </li>
        </ul>

        <?php echo nl2br(htmlspecialchars($propiedad['descripcion'])); ?>
    </div>
</main>

<?php 
    pg_close($db); // Cerrar conexión con PostgreSQL

    incluirTemplate('footer');
?>
