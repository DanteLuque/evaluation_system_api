<?php

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=' . $_ENV['HOST'] . ';dbname=' . $_ENV['DB'],
                    $_ENV['USER'],
                    $_ENV['PASSWORD']
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "🐬 Conexión exitosa a la base de datos: " . $_ENV['DB'] . "\n";
            } catch (PDOException $e) {
                die("🐈‍⬛ Error al conectar: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}

$db = Database::getInstance();
