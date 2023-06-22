<!DOCTYPE html>
<html>
<head>
    <title>Mapa colaborativo</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Cargar los puntos de ubicación desde la base de datos y mostrarlos en el mapa con popups
        <?php
        require_once('controller/db_connection.php');

        $sql = "SELECT ST_X(coordenadas) AS lat, ST_Y(coordenadas) AS lng, e.titulo, e.descripcion FROM ubicacion u
                INNER JOIN elemento e ON u.id_elemento = e.id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $lat = $row['lat'];
            $lng = $row['lng'];
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];

            echo "L.marker([$lat, $lng]).addTo(map).bindPopup('<b>$titulo</b><br>$descripcion');";
        }
        ?>

    </script>


    <div class="buttons">
        <button onclick="document.location='login.php'">Iniciar sesión</button>
        <button onclick="document.location='registro.php'">Registro</button>
    </div>
</body>
</html>
