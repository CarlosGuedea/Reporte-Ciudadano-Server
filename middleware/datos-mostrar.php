<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lugares";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM places";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Lugares</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Datos de Lugares</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Descripción</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>ID Celular</th>
        <th>Imagen</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["latitude"] . "</td>";
            echo "<td>" . $row["longitude"] . "</td>";
            echo "<td>" . $row["id_celular"] . "</td>";
            echo "<td><img src='" . $row["imagen"] . "' height='100'></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay datos disponibles</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
