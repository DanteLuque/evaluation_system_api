<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../evaluacion.model.php';
$db = Database::getInstance();

$found = Evaluacion::getById($db, 1);
echo "Evaluación encontrada por ID:\n";
print_r($found);
