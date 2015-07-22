<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Repartition extends Model
{
    
	public $table = "repartitions";
    

	public $fillable = [
	    "idAnnee",
		"idProfile",
		"budgetInvestissement",
		"budgetFonctionnement"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "idAnnee" => "integer",
		"idProfile" => "integer",
		"budgetInvestissement" => "integer",
		"budgetFonctionnement" => "integer"
    ];

	public static $rules = [
	    "idAnnee" => "required",
		"idProfile" => "required",
		"budgetInvestissement" => "required",
		"budgetFonctionnement" => "required"
	];

}
