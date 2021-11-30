<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'fcm_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Mutator
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }


     //Accessor
     public function getNameAttribute($name)
     {
         return ucfirst($name);
     }

     //Mutator
     public function setPasswordAttribute($password)
     {
         $this->attributes['password'] = Hash::make($password);
     }

    //Mutator
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }


}
