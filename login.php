<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    
    <form method="POST" action="controller/login_handler.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required><br><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
