<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class OfficerRequest extends Request
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
            'input_name' => 'required|max:50|min:2|string',
            'input_address' => 'required|max:50|min:2|string'
        ];
    }

    public function message()
    {
        return [

        ];
    }
}
