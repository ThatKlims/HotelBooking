<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        return ['room_number' => 'required|integer', 'room_description' => 'required', 'price_per_night' => 'required|integer'];
    }

    protected function prepareForValidation()
    {
        $this->merge(['room_number' => stripslashes(strip_tags($this['room_number'])),
            'room_description' => stripslashes(strip_tags($this['room_description'])),
            'price_per_night' => stripslashes(strip_tags($this['price_per_night']))]);
    }
}
