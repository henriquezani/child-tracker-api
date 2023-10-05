<?php

namespace App\Models;

class Company extends BaseModel {

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fancy_name',
        'document_number',
        'address_id'
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
