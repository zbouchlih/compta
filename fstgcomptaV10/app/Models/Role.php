<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Role extends Model
{
    
	public $table = "roles";
    

	public $fillable = [
	    "role"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "role" => "string"
    ];

	public static $rules = [
	    "role" => "required|unique:roles",
	];


    public function profiles()
    {
        return $this->hasMany('Profile');
    }

     public function rights()
    {
        return $this->belongsToMany('Right');
    }

}
