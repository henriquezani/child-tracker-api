<?php

namespace App\Models;

class Address extends BaseModel {

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'zipcode',
        'uf',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state_id',
        'city_id'
    ];

    /**
     * Os atributos que devem ser transformados.
     *
     * @var string[]
     */
    protected $casts = [
        'created_at' => self::DATETIME_CAST_FORMAT,
        'updated_at' => self::DATETIME_CAST_FORMAT,
    ];

}
