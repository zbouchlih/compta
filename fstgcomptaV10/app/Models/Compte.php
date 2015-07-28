<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Compte extends Model
{
    
	public $table = "comptes";
    

	public $fillable = [
	    "numero",
		"compte",
		"idTypebudget"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "numero" => "string",
		"compte" => "string",
		"idTypebudget" => "integer"
    ];

	public static $rules = [
	    "numero" => "required",
		"compte" => "required",
		"idTypebudget" => "required"
	];

	public function repartitions()
    {
        return $this->belongsToMany('App\Models\Repartition');
    }

}
