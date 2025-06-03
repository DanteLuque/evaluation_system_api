<?php

require_once __DIR__ . '/../../shared/model-base.php';

class Evaluacion extends ModelBase
{
    public ?int $id;
    public int $idArea;
    public string $fechaInicio;
    public string $fechaFin;
    public int $tiempoDesarrollo;

    public function __construct(
        ?int $id,
        int $idArea,
        string $fechaInicio,
        string $fechaFin,
        int $tiempoDesarrollo
    ) {
        parent::__construct();
        $this->id = $id;
        $this->idArea = $idArea;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->tiempoDesarrollo = $tiempoDesarrollo;
    }

    public static function getAll(PDO $db): array
    {
        $stmt = $db->query("SELECT * FROM EVALUACIONES WHERE deleted_at IS NULL");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $db, int $id): ?array
    {
        $stmt = $db->prepare("SELECT * FROM EVALUACIONES WHERE ID = ? AND deleted_at IS NULL");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function create(PDO $db): int
    {
        $now = date('Y-m-d H:i:s');
        $this->created_at = $now;
        $this->updated_at = $now;

        $stmt = $db->prepare("
            INSERT INTO EVALUACIONES 
            (ID_AREA, FECHA_INICIO, FECHA_FIN, TIEMPO_DESARROLLO, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $this->idArea,
            $this->fechaInicio,
            $this->fechaFin,
            $this->tiempoDesarrollo,
            $this->created_at,
            $this->updated_at
        ]);
        return $db->lastInsertId();
    }
}
