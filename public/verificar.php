<?php
require_once 'models/db.php'; // conexión

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $query = "SELECT * FROM clientes WHERE token = :token"; // aqui es un ejemplo
    $stmt = $pdo->prepare($query);
    $stmt->execute([':token' => $token]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cliente) {
        $updateQuery = "UPDATE clientes SET verificado = 1 WHERE token = :token";
        $updateStmt = $pdo->prepare($updateQuery);
        $updateStmt->execute([':token' => $token]);

        echo "Cuenta verificada con éxito. Puedes iniciar sesión.";
    } else {
        echo "Token de verificación inválido";
    }
} else {
    echo "No se ha proporcionado un token válido.";
}
?>
