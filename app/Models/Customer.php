<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends BaseModel {

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'person_id',
    ];


    public function person(): HasOne {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }

    public function company(): HasOne {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

}
