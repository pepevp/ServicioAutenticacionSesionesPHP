<?php
// 1. Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la cookie de sesión, también se debe eliminar
// la cookie de sesión. Nota: Esto destruirá la sesión, no solo los datos de sesión.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión (requisito técnico 1)
session_destroy();

// Redirigir al login (requisito técnico 2)
header('Location: index.php');
exit;
?>