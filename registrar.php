<?php
// Ruta del archivo donde se guardarán los nombres
$archivo = 'estudiantes.txt';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre del formulario
    $nombre = trim(htmlspecialchars($_POST['nombre']));

    // Verificar si el nombre no está vacío
    if (!empty($nombre)) {
        // Guardar el nombre en el archivo
        if (file_put_contents($archivo, $nombre . PHP_EOL, FILE_APPEND | LOCK_EX) !== false) {
            $mensaje = "Nombre registrado con éxito.";
        } else {
            $mensaje = "Error al registrar el nombre.";
        }
    } else {
        $mensaje = "El campo del nombre no puede estar vacío.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Nombres de Estudiantes</title>
</head>
<body>
    <h1>Registro de Nombres de Estudiantes</h1>
    
    <!-- Mostrar mensaje de éxito o error -->
    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <!-- Formulario para ingresar nombres -->
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <input type="submit" value="Registrar">
    </form>

    <!-- Enlace para ver la lista de nombres registrados -->
    <a href="mostrar_nombres.php">Ver lista de nombres registrados</a>
</body>
</html>

