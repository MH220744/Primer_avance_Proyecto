<?php
require_once 'models/db.php'; 

if (isset($_POST['registrarse'])) {
    // Obtener los datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $dui = $_POST['dui'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Cifrar la contraseña

    // Generar un token único para la verificación
    $token = bin2hex(random_bytes(50));

    // Insertar el nuevo usuario en la base de datos
   //Aqui debe ir los datos de la tabla

    // Enviar el correo de verificación
    $to = $correo;
    $subject = "Verificar cuenta";
    $message = "Para verificar tu cuenta, haz clic en el siguiente enlace:";
    //aqui debe ir el enlace para verificar token
    $headers = "";

// Enviar correo
mail($to, $subject, $message, $headers);

    if (mail($to, $subject, $message, $headers)) {
        echo "Te hemos enviado un correo de verificación.";
    } else {
        echo "Hubo un problema al enviar el correo, intenta nuevamente";
    }
}
?>
