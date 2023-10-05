<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {

    const DATETIME_CAST_FORMAT = 'datetime:Y-m-d H:i:s';

    use HasFactory;

    /**
     * Os atributos que devem ser transformados.
     *
     * @var string[]
     */
    protected $casts = [
        'created_at' => self::DATETIME_CAST_FORMAT,
        'updated_at' => self::DATETIME_CAST_FORMAT,
    ];

    /**
     * Armazena as relações da model.
     *
     * @var string[]
     */
    public array $ralationsList = [];

    /**
     * Construtor de inicialização da classe.
     */
    public function  __construct(array $attributes = []) {
        parent::__construct($attributes);
    }

}
