<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../pregunta.model.php';

$db = Database::getInstance();

$found = Pregunta::getById($db, 1);
echo "Pregunta encontrada por ID:\n";
print_r($found);
