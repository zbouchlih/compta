<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class BudgetFonctionnement extends Model
{
    
	public $table = "budgetFonctionnements";
    

	public $fillable = [
	    "previsionnel",
		"initial",
		"modificatif",
		"idAnnee"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "previsionnel" => "integer",
		"initial" => "integer",
		"modificatif" => "integer",
		"idAnnee" => "integer"
    ];

	public static $rules = [
	    "previsionnel" => "required",
		"initial" => "required",
		"modificatif" => "required",
		"idAnnee" => "required"
	];

}
