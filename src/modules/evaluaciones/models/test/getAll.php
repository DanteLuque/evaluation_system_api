<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../evaluacion.model.php';
$db = Database::getInstance();

$all = Evaluacion::getAll($db);
echo "Lista de evaluaciones:\n";
print_r($all);

