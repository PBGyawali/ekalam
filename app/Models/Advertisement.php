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


    public function getImageAttribute($value)
    {
        if (file_exists(config('constants.storage_path').'/advertisement/'.$value))
            return config('constants.storage_url').'/advertisement/'.$value;
        else
            return '' ;
    }

    function has_image()	{
        return $this->image==''?false :true;
    }
}
