<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    protected $fillable = [
        'title',	'image',	'link',	'status',	'position',	'start_date',	'end_date'
    ];


    protected $dates = ['created_at','updated_at','start_date','end_date'];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
}
