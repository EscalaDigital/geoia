<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    $sql = "INSERT INTO usuarios (email, nombre, clave) VALUES ('$email', '$nombre', '$clave')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirigir automáticamente a la página de inicio de sesión
        header("Location: ../login.php");
        exit();
    } else {
        // Error al registrar el usuario, mostrar mensaje de error y redirigir a la página de registro
        echo "Ocurrió un error en el registro. Por favor, intente nuevamente.";
        header("Refresh: 3; URL=registro.php");
        exit();
    }
}
?>
