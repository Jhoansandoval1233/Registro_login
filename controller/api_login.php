
<?php
// Cabeceras para permitir JSON y solicitudes externas
header("Content-Type: application/json");

// Array de usuarios
$usuarios = [
    "juan" => "1234",
    "ana" => "abcd",
    "admin" => "admin"
];

// Solo responder si es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    $usuario = $input['usuario'] ?? '';
    $clave = $input['clave'] ?? '';

    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $clave) {
        echo json_encode(["status" => "success", "message" => "Login correcto"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Credenciales inválidas"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>