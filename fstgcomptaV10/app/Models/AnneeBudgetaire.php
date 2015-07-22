<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class AnneeBudgetaire extends Model
{
    
	public $table = "anneeBudgetaires";
    

	public $fillable = [
	    "annee",
		"etat"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "annee" => "string",
		"etat" => "integer"
    ];

	public static $rules = [
	    "annee" => "required",
		"etat" => "required"
	];

}
