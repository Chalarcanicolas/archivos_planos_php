<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Estudiantes Registrados</h1>
    <?php
    // Definir la ruta del archivo CSV
    $archivo = 'estudiantes.txt';

    // Verificar si el archivo existe
    if (file_exists($archivo)) {
        // Abrir el archivo para leerlo
        $archivo_abierto = fopen($archivo, 'r');

        // Leer las líneas del archivo y mostrarlas en una tabla
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Correo Electrónico</th><th>Teléfono</th></tr>";

        while (($datos = fgetcsv($archivo_abierto, 1000, ",")) !== FALSE) {
            echo "<tr>";
            foreach ($datos as $dato) {
                echo "<td>" . htmlspecialchars($dato) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        // Cerrar el archivo
        fclose($archivo_abierto);
    } else {
        echo "<p>No se encontraron datos de estudiantes.</p>";
    }
    ?>
</body>
</html>
