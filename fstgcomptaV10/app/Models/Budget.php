<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Budget extends Model
{
    
	public $table = "budgets";
    

	public $fillable = [
	    "previsionnel",
		"initial",
		"modificatif",
		"idAnnee",
		"idTypebudget"
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
		"idAnnee" => "integer",
		"idTypebudget" => "integer"
    ];

	public static $rules = [
	    "previsionnel" => "required",
		"initial" => "required",
		"modificatif" => "required",
		"idAnnee" => "required",
		"idTypebudget" => "required"
	];

}
