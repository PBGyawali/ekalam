<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class NewsPost extends Model
{
    use HasFactory;
    protected $fillable =
    ['title','body','user_id','summary','location',
    'news_date', 'description' ,'source','slug','category_id'
    ,'featured' ,'status','state'];

    protected $dates = ['created_at','updated_at','news_date'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public static function scopeCategories($query, $id)
    {
        return $query->where('category_id', $id);
    }

    public static function scopeState($query, $id)
    {
        return $query->where('state', $id);
    }

    public static function scopeFeatured($query)
    {
        return $query->where('featured',true);
    }


    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
    public function getNewsDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));

    }
    public function getImageAttribute($value)
    {
        if (file_exists(config('constants.storage_path').'/news/'.$value))
            return config('constants.storage_url').'/news/'.$value;
        else
            return config('constants.asset_url').'/logo/logo.png' ;
    }

    function has_image()	{
        return basename($this->image)=='logo.png'?false :true;
    }


    function is_active()	{
        return $this->status=='active'?true :false;
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    protected static function booted()
    {
        static::creating(function ($newsPost) {
            $newsPost->user_id = auth()->user()->id;
        });
    }
}
