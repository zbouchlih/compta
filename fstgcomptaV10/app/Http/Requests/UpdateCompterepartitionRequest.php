<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Compterepartition;

class UpdateCompterepartitionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'credit_ouvert' => 'required',
            'engagement' => 'required',
            'paiement' => 'required'
        ];
	}

}
