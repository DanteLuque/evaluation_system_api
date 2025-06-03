<?php

require_once __DIR__ . '/../models/evaluacion.model.php';
require_once __DIR__ . '/../config/mysql/mysql.php';

class EvaluacionController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        try {
            return Evaluacion::getAll($this->db);
        } catch (Exception $e) {
            throw new Exception("Error al obtener evaluaciones: " . $e->getMessage());
        }
    }

    public function getById(int $id): ?array
    {
        try {
            return Evaluacion::getById($this->db, $id);
        } catch (Exception $e) {
            throw new Exception("Error al obtener evaluación: " . $e->getMessage());
        }
    }

    public function create(array $data): array
    {
        try {
            $evaluacion = new Evaluacion(
                null,
                $data['idArea'],
                $data['fechaInicio'],
                $data['fechaFin'],
                $data['tiempoDesarrollo']
            );

            $id = $evaluacion->create($this->db);

            return [
                'success' => true,
                'message' => 'Evaluación creada exitosamente',
                'id' => $id
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Error al crear evaluación: ' . $e->getMessage()
            ];
        }
    }
}
