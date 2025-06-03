<?php

class Server
{
    private array $router;

    public function __construct()
    {
        $this->connectDB();
        $this->router = [];
        $this->registerRoutes();
    }

    private function connectDB()
    {
        require_once __DIR__ . '/config/mysql/mysql.php';
    }

    private function registerRoutes()
    {
        require_once __DIR__ . '/modules/evaluaciones/routes/evaluacion.route.php';
        (new EvaluacionRoutes())->registerRoutes($this->router);
    }

    public function handleRequest()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $basePath = '/evaluation_system_api/public';

        if (str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
        }

        $route = $this->findMatchingRoute($uri);

        if (!$route) {
            $this->sendResponse(404, ['error' => 'Ruta no encontrada']);
            return;
        }

        if (!isset($route['methods'][$method])) {
            $this->sendResponse(405, ['error' => 'Método no permitido']);
            return;
        }

        $route['methods'][$method](...$route['params']);
    }

    private function findMatchingRoute(string $uri): ?array
    {
        foreach ($this->router as $pattern => $methods) {
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                return [
                    'methods' => $methods,
                    'params' => array_slice($matches, 1)
                ];
            }
        }
        return null;
    }

    private function sendResponse(int $statusCode, array $data): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
