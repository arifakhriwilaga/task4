<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'input_id' => 'required',
            'input_title_image' => 'required|max:150|min:2|string',
            'input_description_image' => 'required|min:2|string',
            'image' => 'required'

        ];
    }

    public function message()
    {
        return [
        ];
    }
}
