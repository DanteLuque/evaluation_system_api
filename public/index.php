<?php
require_once __DIR__ . '/../src/boot.php';
require_once __DIR__ . '/../src/Server.php';

$server = new Server();
$server->handleRequest();
