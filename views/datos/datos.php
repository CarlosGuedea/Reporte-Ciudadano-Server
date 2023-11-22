<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Lugares</title>
</head>
<body>
<form action="/datos-ingresar" method="post" enctype="multipart/form-data">
    <label for="description">Descripción:</label><br>
    <input type="text" id="description" name="description"><br>
    
    <label for="latitude">Latitud:</label><br>
    <input type="number" id="latitude" name="latitude"><br>
    
    <label for="longitude">Longitud:</label><br>
    <input type="number" id="longitude" name="longitude"><br>

    <label for="id_celular">ID Celular:</label><br>
    <input type="number" id="id_celular" name="id_celular"><br>

    <label for="image">Imagen:</label><br>
    <input type="file" id="image" name="image"><br>
    
    <input type="submit" value="Enviar">
</form>


</body>
</html>
