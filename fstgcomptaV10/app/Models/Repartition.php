<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Repartition extends Model
{
    
	public $table = "repartitions";
    

	public $fillable = [
	    "idBudget",
		"idProfile",
		"budget"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "idBudget" => "integer",
		"idProfile" => "integer",
		"budget" => "integer"
    ];

	public static $rules = [
	    "idBudget" => "required",
		"idProfile" => "required",
		"budget" => "required"
	];

}
