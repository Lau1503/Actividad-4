<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Actividad 4</title>
</head>

<body>
    <div class="users-form">
        <h1>Base registro de nuevos clientes</h1>
        <form action="" method="post">
        <input type="text" placeholder="Número de documento">
            <input type="text" placeholder="Nombres y Apellidos">
            <input type="text" placeholder="Sexo">
            <input email="email" placeholder="Correo">
            <input date="date" placeholder="Fecha de nacimiento">
            <input type="submit" value="Agregar">
           

        </form>
    </div>
    <div class="users-table">
        <h2>Registro Clientes conferencia</h2>
        <table>
    <thead>
        <tr>
            <th>Número de documento<</th>
            <th>Nombres y Apellidos</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Fecha de nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Número de documento</td>
            <td>Nombres y Apellidos</td>
            <td>Sexo</td>
            <td>Correo</td>
            <td>Fecha de nacimiento"</td>
            <td>
                <button class="users-table--edit">Editar</button>
                <button class="users-table--delete">Eliminar</button>
            </td>
        </tr>
        <!-- Mayor info -->
    </tbody>
</table>

</body>

    <?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "clientes";

    $connection = new mysqli($server, $user, $pass, $db);

    if ($connection->connect_errno) {
        die("Conexión fallida: " . $connection->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeroDocumento = $_POST["Número de documento"];
        $nombresApellidos = $_POST["Nombres y Apellidos"];
        $sexo = $_POST["Sexo"];
        $correo = $_POST["Correo"];
        $fechaNacimiento = $_POST["Fecha de nacimiento"];

        $sql = "INSERT INTO usuarios (NumeroDocumento, NombresApellidos, Sexo, Correo, FechaNacimiento) 
                VALUES ('$numeroDocumento', '$nombresApellidos', '$sexo', '$correo', '$fechaNacimiento')";

        if ($connection->query($sql) === TRUE) {
            echo "Registro insertado correctamente";
        } else {
            echo "Error al insertar el registro: " . $connection->error;
        }
    }
    ?>
    <?php
    $textoDinamico = "Estás invitado a nuestra conferencia online sobre cuidado parental. Descubre estrategias efectivas y consejos prácticos de psicología infantil.";
    echo "<p>$textoDinamico</p>";
    
    $sql = "SELECT * FROM usuarios";
    $resultado = $connection->query($sql);
    ?>

    <div class="container">
        <h2 class="text-center mb-2">Inicio de sesión</h2>
        <form method="POST" enctype="multipart/form-data">
            <!-- Tu formulario aquí -->
            <div class="row mb-2">
                <div class="col">
                    <label for="numero_documento">Número de documento</label>
                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" placeholder="">
                </div>
                <!-- Otros campos del formulario -->
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <div class="container">
        <h2 class="text-center mb-2">Clientes Registrados en la Conferencia</h2>
        <table>
            <thead>
                <tr>
                    <th>NumeroDocumento</th>
                    <th>NombresApellidos</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>FechaNacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["Número de documento"] . "</td>";
                    echo "<td>" . $fila["Nombres y Apellidos"] . "</td>";
                    echo "<td>" . $fila["Sexo"] . "</td>";
                    echo "<td>" . $fila["Correo"] . "</td>";
                    echo "<td>" . $fila["Fecha de nacimiento"] . "</td>";
                    echo "<td>";
                    echo "<button class='users-table--edit'>Editar</button>";
                    echo "<button class='users-table--delete'>Eliminar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
$connection->close();
?>
