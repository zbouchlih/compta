<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
	public $table = "profiles";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"access"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
		"access" => "integer"
    ];

	public static $rules = [
	    "name" => "required|unique:profiles",
		"access" => "required"
	];

	public function users()
	{
		return $this->hasMany('User');
	}

}
