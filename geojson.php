<?php
$servername = "localhost";
$database = "mapa";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES 'utf8'");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$query = "SELECT e.id, e.titulo, e.descripcion, e.fecha_toma, ST_AsGeoJSON(u.coordenadas) AS geojson FROM elemento e INNER JOIN ubicacion u ON e.id = u.id_elemento";
$stmt = $conn->prepare($query);
$stmt->execute();

$features = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $properties = [
        "id" => $row["id"],
        "titulo" => $row["titulo"],
        "descripcion" => $row["descripcion"],
        "fecha_toma" => $row["fecha_toma"],
    ];

    $geometry = json_decode($row["geojson"]);
    $feature = [
        "type" => "Feature",
        "geometry" => $geometry,
        "properties" => $properties,
    ];

    $features[] = $feature;
}

$geojson = [
    "type" => "FeatureCollection",
    "features" => $features,
];

header("Content-type: application/json");
echo json_encode($geojson, JSON_NUMERIC_CHECK);
?>
