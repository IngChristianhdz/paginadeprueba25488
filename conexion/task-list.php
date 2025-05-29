<?php
include('database.php');
session_start();

if (!isset($_SESSION["Correo1S"])) {
    echo json_encode(["error" => "Sesión inválida"]);
    exit;
}
header('Content-Type: application/json');
$correo1 = $_SESSION["Correo1S"];

// Corrección importante: Usar consistentemente mysqli o PDO, no mezclar
$stmt = $connection->prepare("SELECT * FROM usuario WHERE correo = ?");
$stmt->bind_param("s", $correo1);
$stmt->execute();
$result = $stmt->get_result(); // Cambio crucial aquí

$json = array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $consumo = $row['consumoh'] ?? '';
// Validar que el consumo tenga el formato correcto
if (strlen($consumo) < 100 || !preg_match('/^[0-9]{5,}/', $consumo)) {
    $consumo = ''; // O algún valor por defecto
}
echo "Consumo".$consumo;
        
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
            'consumo' => $consumo
        );
    }
} else {
    $json = ["error" => "Error en la consulta: " . $connection->error];
}

$jsonstring = json_encode($json);
echo $jsonstring;

// Cerrar conexiones
$stmt->close();
$connection->close();
?>