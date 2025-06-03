<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../alternativa.model.php';

$db = Database::getInstance();

$found = Alternativa::getById($db, 2);
echo "Alternativa encontrada por ID:\n";
print_r($found);
