<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id','status'];

    public function newsPosts()
    {
        return $this->hasMany(NewsPost::class);
    }
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }


    protected static function booted()
    {
      static::creating(function ($category) {
        $category->user_id = auth()->user()->id;
    });
  }
}
