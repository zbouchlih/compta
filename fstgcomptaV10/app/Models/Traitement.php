<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Traitement extends Model
{
    
	public $table = "traitements";
    

	public $fillable = [
	    "text"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "text" => "string"
    ];

	public static $rules = [
	    "text" => "required"
	];

}
