<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /** The attributes that are mass assignable.
     * @var array   */

    protected $fillable=['name','email','password','user_type','status'];

    /** The attributes that should be hidden for arrays.
     * @var array */
    protected $hidden=['password','remember_token','two_factor_recovery_codes','two_factor_secret'];

    /**  The attributes that should be cast to native types.
    *@var array */
    protected $casts = ['email_verified_at'=>'datetime'];

    /** The accessors to append to the model's array form.
     * @var array */
    protected $appends = ['profile_photo_url'];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
    public function setNameAttribute($name){
        $this->attributes['name'] = ucwords($name);
    }
    public function newsPosts(){
    	return $this->hasMany(NewsPost::class);
    }

    function is_user(){
        return $this->user_type=='user' ? true : false;
    }
    function is_editor()	{
        return $this->user_type=='editor'?true:($this->user_type=='admin'?true:($this->user_type=='owner'?true:false) ) ;
	}
	 function is_admin()	{
        return $this->user_type=='admin'?true:($this->user_type=='owner'?true:false) ;
    }

    function is_reporter()	{
        return $this->user_type=='reporter'?true:false;
    }


    public function categories(){
        return $this->hasMany(Category::class);
    }

}
