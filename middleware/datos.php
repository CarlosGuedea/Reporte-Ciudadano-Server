<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lugares";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los datos necesarios están presentes
    if (
        isset($_POST['description']) &&
        isset($_POST['latitude']) &&
        isset($_POST['longitude']) &&
        isset($_POST['id_celular'])
    ) {
        var_dump($_POST);

        // Obtener la ruta temporal del archivo subido
$image_path = $_FILES['imagen']['tmp_name'];

// Definir la carpeta donde se almacenará la imagen
$upload_directory = '/imagenes';

// Crear un nombre único para la imagen
$image_name = uniqid() . '-' . $_FILES['imagen']['name'];

// Mover la imagen a la carpeta de destino
$destination = $upload_directory . $image_name;
move_uploaded_file($image_path, $destination);
        // Prepara la consulta para insertar datos en la tabla
        $stmt = $conn->prepare("INSERT INTO places (description, latitude, longitude, id_celular, imagen) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sddid", $_POST['description'], $_POST['latitude'], $_POST['longitude'], $_POST['id_celular'], $_POST['imagen']);
        $stmt->execute();

        // Verifica si se insertaron filas correctamente
        if ($stmt->affected_rows > 0) {
            echo "Datos insertados correctamente en la base de datos.";
        } else {
            echo "Error al insertar datos en la base de datos.";
        }

        // Cierra la consulta y la conexión
        $stmt->close();
    } else {
        echo "Datos incompletos recibidos.";
    }
} else {
    echo "Solicitud incorrecta.";
}

// Cierra la conexión a la base de datos
$conn->close();