<?php
include("connection.php");

// Preparar la consulta SQL con marcadores de posición
$sql = "INSERT INTO usuarios (`Número de documento`, `Nombres y Apellidos`, `sexo`, `Correo`, `Fecha de nacimiento`) 
        VALUES (?, ?, ?, ?, ?)";

// Obtener la conexión
$conn = connection();

// Verificar si se puede preparar la consulta correctamente
if ($stmt = $conn->prepare($sql)) {
    // Asignar valores a los parámetros
    $stmt->bind_param("sssss", $_POST["Número de documento"], $_POST["Nombres y Apellidos"], $_POST["Sexo"], $_POST["Correo"], $_POST["Fecha de nacimiento"]);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
