<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['comment']);

    // Validar el formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Formato de email inválido";
        exit;
    }

    // Configurar los parámetros del correo
    $para = "or.echeverria@duocuc.cl"; // Reemplaza con tu dirección de correo
    $asunto = "Mensaje del formulario de contacto de " . $nombre;
    $contenido = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";
    $encabezados = "From: $email";

    // Enviar el correo
    if (mail($para, $asunto, $contenido, $encabezados)) {
        echo "¡Tu mensaje ha sido enviado. Gracias!";
    } else {
        echo "Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    echo "Método de solicitud inválido.";
}
?>