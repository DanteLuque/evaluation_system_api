<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../pregunta.model.php';

$db = Database::getInstance();

$all = Pregunta::getAll($db);
echo "Lista de preguntas:\n";
print_r($all);
