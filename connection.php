<?php
function connection(){
    
$server = "localhost";
$user =  "root";
$pass = "";
$db = "clientes";

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

return $conn;
}
?>
