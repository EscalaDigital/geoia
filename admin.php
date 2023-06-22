<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Administrador</h2>
    
    <form method="POST" action="controller/admin_handler.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>
        
        <label for="coordenadas_x">Coordenadas X:</label>
        <input type="text" id="coordenadas_x" name="coordenadas_x" required><br><br>
        
        <label for="coordenadas_y">Coordenadas Y:</label>
        <input type="text" id="coordenadas_y" name="coordenadas_y" required><br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
