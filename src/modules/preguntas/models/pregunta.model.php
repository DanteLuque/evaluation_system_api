<?php

require_once __DIR__ . '/../../shared/model-base.php';

class Pregunta extends ModelBase
{
    public ?int $id;
    public string $enunciado;
    public float $puntaje;
    public int $idEvaluacion;

    public function __construct(
        ?int $id,
        string $enunciado,
        float $puntaje,
        int $idEvaluacion,
    ) {
        parent::__construct();
        $this->id = $id;
        $this->enunciado = $enunciado;
        $this->puntaje = $puntaje;
        $this->idEvaluacion = $idEvaluacion;
    }

    public static function getAll(PDO $db): array
    {
        $stmt = $db->query("SELECT * FROM PREGUNTAS WHERE deleted_at IS NULL");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $db, int $id): ?array
    {
        $stmt = $db->prepare("SELECT * FROM PREGUNTAS WHERE ID = ? AND deleted_at IS NULL");
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
            INSERT INTO PREGUNTAS 
            (ENUNCIADO, PUNTAJE, ID_EVALUACION, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $this->enunciado,
            $this->puntaje,
            $this->idEvaluacion,
            $this->created_at,
            $this->updated_at
        ]);
        return $db->lastInsertId();
    }
}
