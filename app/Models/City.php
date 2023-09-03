<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends BaseModel {

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'uf',
        'ibge',
        'state_id'
    ];

    /**
     * Tabela do banco de dados.
     *
     * @var string
     */
    public $table = 'cities';

    /**
     * Retorna o estado ao qual a cidade pertence
     */
    public function state(): BelongsTo {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
