<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 

    $con = connection();
    $sql = "DELETE FROM clientes WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $con->error;
    }

    $con->close();
}
?>

