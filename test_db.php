<?php
$servername = "perfex-db-do-user-19115536-0.l.db.ondigitalocean.com";
$port = "25060"; // Puerto de DigitalOcean
$username = "doadmin";
$password = "AVNS_i6uiWe0CZHYVzhITCkV";
$dbname = "defaultdb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
}
echo "✅ Conexión exitosa a la base de datos.";

$conn->close();
?>
