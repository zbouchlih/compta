<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Typebudget extends Model
{
    
	public $table = "typebudgets";
    

	public $fillable = [
	    "type"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "type" => "string"
    ];

	public static $rules = [
	    "type" => "required"
	];

}
