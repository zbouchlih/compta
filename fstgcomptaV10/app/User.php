<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstName', 'lastName', 'email', 'email2', 'tel' , 'idProfile' , 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        "firstName" => "string",
        "lastName" => "string",
        "email" => "string",
        "email2" => "string",
        "tel" => "string",
        "idProfile" => "integer",
        "password" => "string"
    ];

    public static $rules = [

        'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'tel' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'email2' => 'required|email|max:255|unique:users',
            "idProfile" => "required",
            'password' => 'required|confirmed|min:6'
    ];

    public function profile()
    {
        return $this->belongsTo('Profile');
    }
}

