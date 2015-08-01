<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Typedepense extends Model
{
    
	public $table = "typedepenses";
    

	public $fillable = [
	    "type",
		"seuil"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "type" => "string",
		"seuil" => "integer"
    ];

	public static $rules = [
	    "type" => "required",
		"seuil" => "required"
	];

	public function depenses()
    {
        return $this->hasMany('App\Models\Depense','idTypedepense','id');
    }

}
