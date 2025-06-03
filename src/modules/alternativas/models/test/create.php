<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../alternativa.model.php';

$db = Database::getInstance();

$alternativa = new Alternativa(
    null,
    'Lima',
    true,
    1
);

$newId = $alternativa->create($db);
echo "Alternativa creada con ID: $newId\n";
