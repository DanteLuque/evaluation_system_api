<?php

require_once __DIR__ . '/../controllers/evaluacion.controller.php';

class EvaluacionRoutes
{
    private EvaluacionController $controller;

    public function __construct()
    {
        $this->controller = new EvaluacionController();
    }

    public function registerRoutes(array &$router)
    {
        $router['/api/v1/evaluaciones'] = [
            'GET' => fn() => $this->controller->getAll(),
            'POST' => fn() => $this->controller->create()
        ];

        $router['/api/v1/evaluaciones/(\d+)'] = [
            'GET' => fn($id) => $this->controller->getById($id)
        ];
    }
}
