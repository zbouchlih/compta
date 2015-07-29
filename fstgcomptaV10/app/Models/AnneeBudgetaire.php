<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Anneebudgetaire extends Model
{
    
	public $table = "anneebudgetaires";
    

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
	    "annee" => "required|unique:anneebudgetaires",
		"etat" => "required"
	];

	public function budgets()
	{
		return $this->hasMany('App\Models\Budget','idAnnee','id');
	}


}
