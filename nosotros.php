<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>En Rienes Raíces, somos un equipo apasionado por la conexión entre las personas y el mundo natural. Nuestra misión es promover un estilo de vida sostenible y saludable, ayudando a las comunidades a redescubrir la importancia de las plantas y la biodiversidad en su entorno.</p>

                <p>Ofrecemos una variedad de productos y servicios, desde asesoramiento en jardinería hasta talleres sobre cultivo de plantas, con el objetivo de inspirar a las personas a cultivar sus propias raíces y a cuidar de nuestro planeta. Creemos en el poder de la naturaleza para transformar vidas y en la necesidad de preservar nuestros ecosistemas para las futuras generaciones.

                    Juntos, estamos construyendo un futuro más verde y consciente, donde cada planta cuenta una historia y cada acción contribuye a un mundo más sostenible.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Nuestra prioridad es tu seguridad. Implementamos medidas de protección avanzadas para garantizar que cada rincón de nuestras propiedades esté resguardado. Nuestro compromiso es ofrecerte un ambiente tranquilo y seguro, donde puedas disfrutar sin preocupaciones.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Ofrecemos opciones competitivas y transparentes en nuestros precios. Cada propiedad está valorada de manera justa, asegurando que obtengas la mejor relación calidad-precio en el mercado. Nos esforzamos por brindarte un servicio accesible y sin sorpresas.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Valoramos tu tiempo y nos comprometemos a ser puntuales en todos nuestros procesos. Desde la visita hasta la firma, trabajamos con eficiencia para asegurarnos de que cada paso se realice de manera fluida y rápida. Tu satisfacción es nuestra meta.</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>