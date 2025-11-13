<?php
// 1. Requisito: Implementar manejo de sesiones
session_start();

// 4. Funcionalidad para cerrar sesión (integrada aquí)
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Eliminar la cookie de sesión
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // 1. Requisito: Destruir la sesión
    session_destroy();

    // 2. Requisito: Uso de header() para redirección al login
    header('Location: index.php');
    exit;
}

// 3. Protección de acceso: Si no está autenticado, redirigir a 'FalloSesion.php'
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // REDIRECCIÓN ACTUALIZADA
    header('Location: FalloSesion.php');
    exit;
}

// Obtener datos del usuario desde la sesión
$display_name = $_SESSION['display_name'] ?? $_SESSION['username'] ?? 'Usuario Desconocido';
$current_time = date('H:i:s');
$date = date('d/m/Y');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Sistema de Autenticación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .welcome-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        h1 {
            color: #007bff;
            margin-bottom: 10px;
        }
        .user-name {
            font-size: 2.2em;
            color: #0056b3;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .details-box {
            background-color: #f0f8ff;
            border: 1px solid #b3d9ff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 1.1em;
            line-height: 1.6;
        }
        .time-data {
            font-weight: bold;
            color: #28a745;
            display: block;
            margin-top: 10px;
        }
        .logout-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .logout-link:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>¡Acceso Exitoso!</h1>
        
        <!-- 2. Muestra el nombre del usuario -->
        <p class="user-name">Bienvenido, <?php echo htmlspecialchars($display_name); ?></p>

        <div class="details-box">
            <!-- 2. Mensaje de bienvenida específico -->
            <p>Tu sesión está activa. Este es el área protegida del sistema.</p>
            
            <!-- 2. Muestra la hora actual y la fecha -->
            <span class="time-data">Hora actual: <?php echo $current_time; ?></span>
            <span class="time-data">Fecha de hoy: <?php echo $date; ?></span>
        </div>

        <!-- 4. Enlace que activa la lógica de logout en este mismo archivo (bienvenida.php?action=logout) -->
        <a href="bienvenida.php?action=logout" class="logout-link">Cerrar Sesión</a>
    </div>
</body>
</html>