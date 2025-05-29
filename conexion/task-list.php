<?php
include('database.php');
session_start();

if (!isset($_SESSION["Correo1S"])) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Sesion invalida"]);
    exit;
}

$correo1 = $_SESSION["Correo1S"];

$stmt = $connection->prepare("SELECT * FROM usuario WHERE correo = ?");
$stmt->bind_param("s", $correo1);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $adeudo = floatval($row['adeudo'] ?? 0);
    $adeudopagv = floatval($row['adeudopagv'] ?? 0);
    $adeudopsus = floatval($row['adeudopsus'] ?? 0);
    $pagoL = floatval($row['pagoL'] ?? 0);
    $suma = ($adeudo + $adeudopagv + $adeudopsus) - $pagoL;
    
    $json[] = array(
        'vence' => $row['vence'] ?? '',
        'total' => $suma,
        'estatus' => ($row['pagolinea'] ?? '') . ($row['pagol'] ?? ''),
        'id' => $row['cuenta'] ?? '',
        'consumo' => $row['consumoh'] ?? ''
    );
}

header('Content-Type: application/json');
echo json_encode($json);

$stmt->close();
$connection->close();
?>