<?php

require_once __DIR__ . '/../models/evaluacion.model.php';
require_once __DIR__ . '/../../../config/mysql/mysql.php';

class EvaluacionController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): void
    {
        try {
            $evaluaciones = Evaluacion::getAll($this->db);
            header('Content-Type: application/json');
            echo json_encode($evaluaciones);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Error al obtener evaluaciones: ' . $e->getMessage()
            ]);
        }
    }

    public function getById(int $id): void
    {
        try {
            $evaluacion = Evaluacion::getById($this->db, $id);

            if (!$evaluacion) {
                http_response_code(404);
                echo json_encode([
                    'success' => false,
                    'message' => 'Evaluación no encontrada'
                ]);
                return;
            }

            header('Content-Type: application/json');
            echo json_encode($evaluacion);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Error al obtener evaluación: ' . $e->getMessage()
            ]);
        }
    }

    public function create(): void
    {
        try {
            $input = json_decode(file_get_contents("php://input"), true);

            if (!isset($input['idArea'], $input['fechaInicio'], $input['fechaFin'], $input['tiempoDesarrollo'])) {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'Faltan campos obligatorios'
                ]);
                return;
            }

            $evaluacion = new Evaluacion(
                null,
                (int) $input['idArea'],
                $input['fechaInicio'],
                $input['fechaFin'],
                (int) $input['tiempoDesarrollo']
            );

            $id = $evaluacion->create($this->db);

            http_response_code(201);
            echo json_encode([
                'success' => true,
                'message' => 'Evaluacion creada exitosamente',
                'id' => $id
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Error al crear Evaluacion: ' . $e->getMessage()
            ]);
        }
    }
}
