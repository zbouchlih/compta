<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Depense extends Model
{
    
	public $table = "depenses";
    

	public $fillable = [
	    "idCompterepartition",
		"quantite",
		"valeur",
		"etat",
		"details"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "idCompterepartition" => "integer",
		"quantite" => "integer",
		"details" => "string",
		"valeur" => "integer",
		"etat" => "integer",
    ];

	public static $rules = [
	    "idCompterepartition" => "required",
		"quantite" => "required",
		"details" => "required",
		"valeur" => "required"
	];

	
	public function compterepartition()
	{
		return $this->belongsTo('App\Models\Compterepartition','idCompterepartition','id');
	}

}
