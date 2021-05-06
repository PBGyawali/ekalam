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


    protected static function booted()
    {
      static::creating(function ($gallery) {
        $gallery->user_id = auth()->user()->id;
    });
  }

}
