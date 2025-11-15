index.php: Contiene el formulario de login. Aquí se inicia la sesión y se procesa el formulario. Si las credenciales son válidas (comparando con el array hardcodeado), se establecen las variables de sesión y se redirige a bienvenida.php.

bienvenida.php: Es la página protegida. Antes de mostrar cualquier contenido, verifica si el usuario está logueado ($_SESSION['logged_in']). Si no lo está, redirige a FalloSesion.php. Muestra el mensaje personalizado y el enlace de cierre de sesión.

FalloSesion.php: La página de acceso denegado. Se muestra cuando se intenta acceder a la pagina de bienvenida sin haber hecho login.

En la pagina de login he puesto los 2 usuarios con los que se puede iniciar sesión y su contraseña para poder probarlo, pero obviamente no es algo que se dejaría.