<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jhamm";//PASO 1nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];//PASO 3crea tablas con estos nombre nombre,correo,mensaje
$correo = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Preparar y verificar la consulta SQL
$sql = "INSERT INTO webb (nombre, correo, mensaje) VALUES (?, ?, ?)"; //PASO 4<---------------INSERT INTO (aqui pone la tabla)(nombre, correo, mensaje)
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Vincular los parámetros y ejecutar la consulta
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()) {
    echo "Datos insertados correctamente";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
