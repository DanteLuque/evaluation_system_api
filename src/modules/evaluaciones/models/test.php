<?php
require_once __DIR__ . '/../../../boot.php';
require_once __DIR__ . '/../../../config/mysql/mysql.php';
require_once __DIR__ . '/evaluacion.model.php';
$db = Database::getInstance();

$evaluacion = new Evaluacion(
    null,
    1,
    '2025-06-03',
    '2025-06-10',
    60
);

// create
$newId = $evaluacion->create($db);
echo "Evaluación creada con ID: $newId\n";

// getAll
$all = Evaluacion::getAll($db);
echo "Lista de evaluaciones:\n";
print_r($all);

// getById
$found = Evaluacion::getById($db, $newId);
echo "Evaluación encontrada por ID:\n";
print_r($found);
