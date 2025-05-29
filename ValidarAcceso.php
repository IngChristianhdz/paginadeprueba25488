<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_error_handler("var_dump");


// Requiere conexión a la base de datos
require_once('conexion/database.php');

// Validar existencia de los campos
if (!isset($_POST['txtcorreo']) || !isset($_POST['txtpass'])) {
    die("Faltan datos del formulario.");
}

$correo = trim($_POST['txtcorreo']);
$contra = trim($_POST['txtpass']);

// Crear conexión
$conexion = new mysqli($server['ip'], $username_usuario, $password_usuario, $database_usuario);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Preparar consulta segura
$stmt = $conexion->prepare("SELECT Correo, Contrasena, Nombre, Perfil FROM registro WHERE Correo = ? AND Contrasena = ?");
$stmt->bind_param("ss", $correo, $contra);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Guardar acceso válido
    $insert = $conexion->prepare("INSERT INTO AccesoWeb (correo, fecha, observacion) VALUES (?, CURRENT_TIMESTAMP, 'Acceso_Valido')");
    $insert->bind_param("s", $correo);
    $insert->execute();

    $_SESSION["Correo1S"] = $correo;

    if ($correo == 'admin@admin.com') {
        
        header("Location: https://jumapac.gob.mx/ReciboPago1.php");
        
    } else {
        
        header("Location: https://jumapac.gob.mx/ReciboPago.php");
    }
    exit;

} else {
    // Acceso inválido
    $insert = $conexion->prepare("INSERT INTO AccesoWeb (correo, fecha, observacion) VALUES (?, CURRENT_TIMESTAMP, 'Error_Invalido')");
    $insert->bind_param("s", $correo);
    $insert->execute();

    header("Location: https://jumapac.gob.mx/cuenta.php");
    exit;
}

$conexion->close();
?>