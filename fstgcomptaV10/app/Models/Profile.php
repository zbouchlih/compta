<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
	public $table = "profiles";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"idRole"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
		"idRole" => "integer"
    ];

	public static $rules = [
	    "name" => "required|unique:profiles",
		"idRole" => "required"
	];

	/*public function users()
	{
		return $this->hasMany('User');
	}*/

	public function role()
	{
		return $this->belongsTo('App\Models\Role','idRole','id');
	}

}
