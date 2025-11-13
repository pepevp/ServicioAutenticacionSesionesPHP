<?php
// 1. Iniciar la sesión (necesario si quieres que el mensaje de error no se muestre si ya está logeado, aunque en este caso es solo informativo)
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fee;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .denied-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
            text-align: center;
            border-left: 5px solid #dc3545;
        }
        h1 {
            color: #dc3545;
            margin-bottom: 15px;
        }
        p {
            font-size: 1.1em;
            line-height: 1.5;
            margin-bottom: 25px;
        }
        .login-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .login-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="denied-container">
        <h1>Acceso Denegado (Error 401)</h1>
        <!-- 3. Pantalla de no tienes permisos -->
        <p>No tienes permiso para acceder a esta página. Debes iniciar sesión para ver el contenido.</p>
        <a href="index.php" class="login-link">Ir a la Pantalla de Login</a>
    </div>
</body>
</html>