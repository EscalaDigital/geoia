<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Registro de usuario</h2>
    
    <form method="POST" action="controller/registro_handler.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required><br><br>
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
