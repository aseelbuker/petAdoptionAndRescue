<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'type',
        'age',
        'gender',
        'size',
        'breed',
        'description',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(PetsImage::class, 'pet_id','id');
    }
}
