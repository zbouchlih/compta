<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Profile;

class UpdateProfileRequest extends Request {

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
		$id = $this->segment(2);
        return [
            'idRole' => 'required',
            'name' => 'required|max:255|unique:profiles,name,' . $id,
        ];
	}

}
