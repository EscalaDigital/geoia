<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND clave = '$clave'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
         // Iniciar sesión con el email del usuario
    session_start();
    $_SESSION['email'] = $email;
        // Usuario y clave válidos, redirigir a la página del administrador
        header("Location: ../admin.php");
        exit();
    } else {
        // Usuario o clave incorrectos, mostrar mensaje de error y redirigir a la página de inicio de sesión
        echo "Email o clave incorrectos. Por favor, intente nuevamente.";
        header("Refresh: 3; URL=login.php");
        exit();
    }
}
?>
