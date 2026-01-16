<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetsImage extends Model
{
    // Explicitly set the table name to match your database
    protected $table = 'pets_images';

    // Allow mass assignment for these columns
    protected $fillable = [
        'pet_id',
        'path',
    ];

    /**
     * Define the relationship back to Report
     * Each PetsImage belongs to a Report
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class,'pet_id','id');
    }
}
