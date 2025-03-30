<?php
require_once 'models/db.php';

if (isset($_POST['iniciar_sesion'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM clientes WHERE correo = :correo AND verificado = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':correo' => $correo]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cliente && password_verify($contraseña, $cliente['contraseña'])) {
        session_start();
        $_SESSION['cliente_id'] = $cliente['id'];
        echo "Bienvenido, " . $cliente['nombres'] . " " . $cliente['apellidos'];
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
