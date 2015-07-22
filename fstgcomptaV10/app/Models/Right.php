<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Right extends Model
{
    
	public $table = "rights";
    

	public $fillable = [
	    "right"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "right" => "string"
    ];

	public static $rules = [
	    "right" => "required|unique:rights"
	];

    public function roles()
    {
        return $this->belongsToMany('Role');
    }

}
