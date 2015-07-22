<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UpdateUserRequest extends Request {

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
            'firstName' => 'required|max:255' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'email2' => 'required|email|max:255|unique:users,email2,' . $id,
            'tel' => 'required',
            'lastName' => 'required|max:255' . $id,
        ];
	}

}
