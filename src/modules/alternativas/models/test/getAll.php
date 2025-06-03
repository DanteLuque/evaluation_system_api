<?php
require_once __DIR__ . '/../../../../boot.php';
require_once __DIR__ . '/../../../../config/mysql/mysql.php';
require_once __DIR__ . '/../alternativa.model.php';

$db = Database::getInstance();

$all = Alternativa::getAll($db);
echo "Lista de alternativas:\n";
print_r($all);
