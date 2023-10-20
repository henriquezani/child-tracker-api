<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends BaseModel {

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'document_number',
        'phone',
        'profile_picture',
        'birthdate',
        'type'
    ];

    /**
     * Os atributos que devem ser transformados.
     *
     * @var string[]
     */
    protected $casts = [
        'birthdate'  => self::DATETIME_CAST_FORMAT,
        'created_at' => self::DATETIME_CAST_FORMAT,
        'updated_at' => self::DATETIME_CAST_FORMAT,
    ];

//    public function user(): BelongsTo {
//        return $this->belongsTo(User::class, 'id', 'person_id');
//    }

    public function user(): HasOne {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }

    public function company(): HasOne {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

}
