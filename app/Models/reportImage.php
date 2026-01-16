<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reportImage extends Model
{
      protected $table = 'report_images';

    // Allow mass assignment for these columns
    protected $fillable = [
        'report_id',
        'path',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class,'report_id','id');
    }
}
