<?php
// 1. Iniciar la sesión
session_start();

// Array predefinido de usuarios para simular la base de datos (requisito técnico 3)
$users = [
    'Pepe' => ['password' => '12345', 'name' => 'Administrador del Sistema'],
    'Carlos' => ['password' => '54321', 'name' => 'Usuario Invitado']
];

$error_message = '';

// Si el usuario ya está autenticado, redirigir a la pantalla de bienvenida
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: bienvenida.php');
    exit;
}

// 1. Procesar el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validación en el servidor (requisito 1)
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        
        // Credenciales válidas: configurar variables de sesión (requisito técnico 1)
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['display_name'] = $users[$username]['name'];

        // Redirigir a la pantalla de bienvenida (requisito técnico 2)
        header('Location: bienvenida.php');
        exit;
    } else {
        $error_message = 'Nombre de usuario o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Autenticación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            color: #d9534f;
            background-color: #f9e4e4;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
            border: 1px solid #d9534f;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Acceso al Sistema</h2>
        
        <?php if ($error_message): ?>
            <div class="error"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p style="text-align: center; margin-top: 20px; font-size: 0.9em; color: #777;">
            Usuarios registrado:
            <br>Pepe / 12345
            <br>Carlos / 54321
        </p>
    </div>
</body>
</html>