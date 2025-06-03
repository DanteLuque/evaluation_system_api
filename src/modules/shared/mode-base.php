<?php

class ModelBase {
    protected ?string $created_at;
    protected ?string $updated_at;
    protected ?string $deleted_at;

    public function __construct(
        ?string $created_at = null,
        ?string $updated_at = null,
        ?string $deleted_at = null
    ) {
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }
}
