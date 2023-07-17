<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
        return ['hotel_name' => 'required|string', 'hotel_description' => 'required'];
    }

    protected function prepareForValidation()
    {
        $this->merge(['hotel_name' => stripslashes(strip_tags($this['hotel_name'])), 'hotel_description' => stripslashes(strip_tags($this['hotel_description']))]);
    }
}
