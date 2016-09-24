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
            'username' => 'required',
            // 'email' => 'required',
            // 'password' => 'required|max:10|min:2|'
        ];
    }

    public function message()
    {
        return [
        'username.required' => 'Username kosong',
        // 'email.require' => 'email kosong',
        // 'password.require' => 'password kosong',

        ];
    }
}
