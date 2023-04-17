<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Gallery extends Model
{
    protected $fillable = ['status','image','name','summary','user_id'];

    public function galleryImage()
    {
        return $this->hasMany(GalleryImage::class);
    }



  public function getNameAttribute($value)
  {
      return ucwords($value);
  }

  public function getImageAttribute($value)
    {
        if (file_exists(config('constants.storage_path').'/gallery/'.$value))
            return config('constants.storage_url').'/gallery/'.$value;
        else
            return '' ;
    }


    protected static function booted()
    {
      static::creating(function ($gallery) {
        $gallery->user_id = auth()->user()->id;
        });
    }

    
}
