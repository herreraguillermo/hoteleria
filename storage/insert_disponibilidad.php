<?php
//archivo por el cual modifica el estado de las habitaciones a disponibles de forma que
//empezaran a aparecer para reservar desde $fechainicio hasta la $fechafin
$host = 'localhost';
$db = 'hoteleria';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Obtén los idHabitacion existentes
$stmt = $pdo->query('SELECT idHabitacion FROM Habitaciones');
$habitaciones = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

foreach ($habitaciones as $idHabitacion) {
    $fechaInicio = strtotime('2024-07-01');
    $fechaFin = strtotime('2024-07-31');

    for ($currentDate = $fechaInicio; $currentDate <= $fechaFin; $currentDate = strtotime('+1 day', $currentDate)) {
        $fecha = date('Y-m-d', $currentDate);
        $stmt = $pdo->prepare('INSERT INTO Disponibilidad (idHabitacion, Fecha, Disponible) VALUES (?, ?, ?)');
        $stmt->execute([$idHabitacion, $fecha, true]);
    }
}

echo "Datos de disponibilidad insertados correctamente.";
?>
