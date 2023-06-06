<?php

$ruta = $_GET['dir'];
$archivo = (__dir__."/app/assets/archivosUsers/$ruta"); // Ruta al archivo PDF

// Verificar si el archivo existe y es accesible
if (file_exists($archivo)) {
    // Configurar las cabeceras para indicar que se trata de un archivo PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($archivo) . '"');
    header('Content-Length: ' . filesize($archivo));

    // Mostrar el contenido del archivo PDF
    readfile($archivo);
} else {
    echo 'El archivo no existe.';
    echo $_GET['dir'];
    echo $archivo;
}
?>