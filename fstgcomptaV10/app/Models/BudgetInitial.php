<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class BudgetInitial extends Model
{
    
	public $table = "budgetInitials";
    

	public $fillable = [
	    "budget",
		"idAnnee"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "budget" => "integer",
		"idAnnee" => "integer"
    ];

	public static $rules = [
	    "budget" => "required",
		"idAnnee" => "required"
	];

}
