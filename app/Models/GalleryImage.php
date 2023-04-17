<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'gallery_id' ,'image' ];


    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value)
    {
        if (file_exists(config('constants.storage_path').'/gallery/'.$value))
            return config('constants.storage_url').'/gallery/'.$value;
        else
            return '' ;
    }
}
