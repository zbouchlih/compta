<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Fournisseur extends Model
{
    
	public $table = "fournisseurs";
    

	public $fillable = [
	    "nom"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nom" => "string"
    ];

	public static $rules = [
	    "nom" => "required"
	];

}
