<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $fillable = [
        'status',
        'pet_type',
        'breed',
        'size',
        'age',
        'color_markings',
        'location',
        'date_time',
        'name',
        'phone',
        'email',
        'additional_info',
        'urgent',
        'allow_contact',
    ];

 public function reportImage()
    {
        return $this->hasMany(reportImage::class,'report_id','id');
    }


}

