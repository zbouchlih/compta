<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Depense extends Model
{
    
	public $table = "depenses";
    

	public $fillable = [
	    "idCompterepartition",
		"idTypedepense",
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
		"idTypedepense" => "integer",
		"details" => "string",
		"valeur" => "integer",
		"etat" => "integer",
    ];

	public static $rules = [
	    "idCompterepartition" => "required",
		"idTypedepense" => "required",
		"details" => "required",
		"valeur" => "required"
	];

	public function typedepense()
	{
		return $this->belongsTo('App\Models\Typedepense','idTypedepense','id');
	}
	public function compterepartition()
	{
		return $this->belongsTo('App\Models\Compterepartition','idCompterepartition','id');
	}

}
