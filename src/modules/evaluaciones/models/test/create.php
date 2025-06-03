<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../evaluacion.model.php';
$db = Database::getInstance();

$evaluacion = new Evaluacion(
    null,
    1,
    '2025-06-03',
    '2025-06-10',
    200
);

$newId = $evaluacion->create($db);
echo "Evaluación creada con ID: $newId\n";
