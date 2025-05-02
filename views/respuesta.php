<?php
// Incluye el archivo con los usuarios registrados
include_once("../config/users.php");

// Verifica si se enviaron los datos del formulario
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Verifica si el usuario existe y la contraseña es correcta
    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $clave) {
        echo "<h3>✅ Autenticación satisfactoria. Bienvenido, $usuario.</h3>";
    } else {
        echo "<h3>❌ Error en la autenticación. Usuario o contraseña incorrectos.</h3>";
    }
} else {
    echo "<h3>⚠️ Por favor, ingrese todos los datos del formulario.</h3>";
}
?>