<?php
require_once('db_connection.php');

session_start(); // Agrega esta línea para iniciar la sesión


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $coordenadas_x = $_POST['coordenadas_x'];
    $coordenadas_y = $_POST['coordenadas_y'];

    if (!isset($_SESSION['email'])) {
        // Si no hay una sesión activa, redirigir a la página de inicio de sesión
        header("Location: login.php");
        exit();
    }

    $fecha_toma = date('Y-m-d');
// Obtener el email del usuario de la sesión activa
$email = $_SESSION['email'];

    $sql_elemento = "INSERT INTO elemento (titulo, descripcion, fecha_toma, email) VALUES ('$titulo', '$descripcion', '$fecha_toma', '$email')";

    if ($conn->query($sql_elemento) === TRUE) {
        $elemento_id = $conn->insert_id;

        $sql_ubicacion = "INSERT INTO ubicacion (coordenadas, id_elemento) VALUES (POINT($coordenadas_x, $coordenadas_y), $elemento_id)";

        if ($conn->query($sql_ubicacion) === TRUE) {
            // Inserción exitosa, redirigir a la página de inicio
            header("Location: ../index.php");
            exit();
        } else {
            // Error al insertar la ubicación, mostrar mensaje de error y redirigir a la página de administrador
            echo "Ocurrió un error al añadir la ubicación. Por favor, intente nuevamente.";
            header("Refresh: 3; URL=admin.php");
            exit();
        }
    } else {
        // Error al insertar el elemento, mostrar mensaje de error y redirigir a la página de administrador
        echo "Ocurrió un error al agregar el elemento. Por favor, intente nuevamente.";
        header("Refresh: 3; URL=admin.php");
        exit();
    }
}
?>
