<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = [
         'title',
         'summary',
        'link',
         'status',
         'video_id',
         'user_id'

        ];


        public function user()
        {
            return $this->belongsTo(User::class);
        }
        protected static function booted()
        {
            static::creating(function ($video) {
                $video->user_id = auth()->user()->id;
            });
        }
        public function getTitleAttribute($value)
        {
            return ucfirst($value);
        }

}
