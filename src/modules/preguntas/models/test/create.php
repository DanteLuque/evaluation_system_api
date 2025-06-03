<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../pregunta.model.php';

$db = Database::getInstance();

$pregunta = new Pregunta(
    null,
    '¿Cuál es la capital de Perú?',
    10.00,
    1
);

$newId = $pregunta->create($db);
echo "Pregunta creada con ID: $newId\n";
