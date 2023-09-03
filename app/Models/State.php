<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends BaseModel {

    /**
     * Tabela do banco de dados.
     *
     * @var string
     */
    public $table = 'states';

    /**
     * Cidades do estado.
     */
    public function cities(): HasMany {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
