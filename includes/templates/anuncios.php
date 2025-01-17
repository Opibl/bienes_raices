<?php 
    // Importar la conexión
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    // Verificar la conexión
    if (!$db) {
        echo "Error al conectar a la base de datos: " . pg_last_error();
        exit;
    }

    // Consultar
    $query = "SELECT * FROM propiedades LIMIT 10";

    // Obtener resultado
    $resultado = pg_query($db, $query);

    if (!$resultado) {
        echo "Error en la consulta: " . pg_last_error($db);
        exit;
    }
?>

<div class="contenedor-anuncios">
    <?php while ($propiedad = pg_fetch_assoc($resultado)): ?>
        <div class="anuncio">
            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
    <?php endwhile; ?>
</div> <!--.contenedor-anuncios-->

<?php 
    // Cerrar la conexión
    pg_close($db);
?>
