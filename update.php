<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 
    $nuevosNombresApellidos = $_POST['nuevos_nombres_apellidos']; 
    $con = connection();
    $sql = "UPDATE clientes SET nombres_apellidos='$nuevosNombresApellidos' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $con->error;
    }

    $con->close();
}
?>

