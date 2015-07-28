<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Compterepartition extends Model
{
    
	public $table = "compte_repartition";
    

	public $fillable = [
	    "repartition_id",
		"compte_id",
		"valeur"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "repartition_id" => "integer",
		"compte_id" => "integer",
		"valeur" => "integer"
    ];

	public static $rules = [
	    
		"compte_id" => "required",
		"valeur" => "required"
	];

	public function comptes()
    {
        return $this->belongsTo('App\Models\Compte','compte_id','id');
    }
    public function repartitions()
    {
        return $this->belongsTo('App\Models\repartition','repartition_id','id');
    }

}
