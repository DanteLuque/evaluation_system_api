<?php

require_once __DIR__ . '/../../shared/model-base.php';

class Alternativa extends ModelBase
{
    public ?int $id;
    public string $enunciado;
    public bool $esCorrecta;
    public int $idPregunta;

    public function __construct(
        ?int $id,
        string $enunciado,
        bool $esCorrecta,
        int $idPregunta
    ) {
        parent::__construct();
        $this->id = $id;
        $this->enunciado = $enunciado;
        $this->esCorrecta = $esCorrecta;
        $this->idPregunta = $idPregunta;
    }

    public static function getAll(PDO $db): array
    {
        $stmt = $db->query("SELECT * FROM ALTERNATIVAS WHERE deleted_at IS NULL");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $db, int $id): ?array
    {
        $stmt = $db->prepare("SELECT * FROM ALTERNATIVAS WHERE ID = ? AND deleted_at IS NULL");
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
            INSERT INTO ALTERNATIVAS 
            (ENUNCIADO, ES_CORRECTA, ID_PREGUNTA, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $this->enunciado,
            $this->esCorrecta,
            $this->idPregunta,
            $this->created_at,
            $this->updated_at
        ]);

        return $db->lastInsertId();
    }
}
