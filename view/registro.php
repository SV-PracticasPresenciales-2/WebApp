
<p>Para registrarte en el foro, introduce los datos:</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php require_once("../controller/userController.php"); ?>
    <label for="nombre_usuario">Nombre de usuario:</label>
    <input id="nombre_usuario" type="text" name="nombre_usuario" <?php echo (isset($alias) ? 'value="'.$alias.'"' : ''); echo (($campo == 'username' || $campo == null) ? 'autofocus':''); ?>>


    <label for="nombre">Name:</label>
    <input id="nombre" type="text" name="name" <?php echo (isset($name) ? 'value="'.$name.'"' : ''); echo ( $campo == 'name' ? 'autofocus':''); ?>>


    <label for="nombre">Biography:</label>
    <input id="nombre" type="text" name="biography" <?php echo (isset($biography) ? 'value="'.$biography.'"' : ''); echo ( $campo == 'Biography' ? 'autofocus':''); ?>>


    <label for="contrasenia">Contraseña:</label>
    <input id="contrasenia" type="password" name="contrasenia" <?php echo ( $campo == ('password'||'password2') ? 'autofocus':''); ?>>

    <label for="email">Email:</label>
    <input id="email" type="text" name="email" <?php echo (isset($email) ? 'value="'.$email.'"' : ''); echo ( $campo == 'email' ? 'autofocus':''); ?>>

    <label for="phone_number">phone_number:</label>
    <input id="phone_number" type="phone_number" name="phone_number" <?php echo (($campo == 'username' || $campo == null) ? 'autofocus':''); ?>>


    <input type="submit" name="registrar" value="enviar">
</form>
<p class="p-registrar-login">Tienes una cuenta? <a class="log-reg" href="loginForm.php">Iniciar sesión</a></p>