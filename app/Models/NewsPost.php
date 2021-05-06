<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;
    protected $fillable = 
    ['title','body','user_id','summary','location',
    'news_date', 'description' ,'source','slug','category_id' 
    ,'featured' ,'status','state'];
    protected $dates = ['created_at','updated_at','news_date'];

    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($newsPost) {
            $newsPost->user_id = auth()->user()->id;
        });
    }
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
}
