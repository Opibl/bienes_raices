<?php 

    require 'includes/config/database.php';
    $db = conectarDB();
    // Autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        if(!$email) {
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password) {
            $errores[] = "El Password es obligatorio";
        }

        if(empty($errores)) {
            // Revisar si el usuario existe.
            $query = "SELECT * FROM usuarios WHERE email = $1";
            $stmt = pg_prepare($db, "get_user", $query);
            $resultado = pg_execute($db, "get_user", array($email));

            if(pg_num_rows($resultado)) {
                // Revisar si el password es correcto
                $usuario = pg_fetch_assoc($resultado);

                // Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    // El usuario está autenticado
                    session_start();

                    // Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                    exit;
                } else {
                    $errores[] = 'El password es incorrecto';
                }
            } else {
                $errores[] = "El Usuario no existe";
            }
        }
    }

    // Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu Password" id="password">
        </fieldset>
    
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php 
    incluirTemplate('footer');
?>
