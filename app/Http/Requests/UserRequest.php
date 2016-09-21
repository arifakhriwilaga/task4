<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class UserRequest extends Request
{
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
            // 'input_username' => 'required|max:150|min:2|string',
            // 'input_email' => 'required',
            // 'input_password' => 'required|max:10|min:2|string'
        ];
    }

    public function message()
    {
        return [

        ];
    }
}
