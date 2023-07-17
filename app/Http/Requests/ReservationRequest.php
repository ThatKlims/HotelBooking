<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
        return ['ClientName' => 'required|string', 'ClientSurname' => 'required|string', 'ClientPhoneNumber' => 'required|numeric',
            'reservation_starts' => 'required|date|before:reservation_ends', 'reservation_ends' => 'required|date'];
    }
    protected function prepareForValidation()
    {
        $this->merge(['ClientName' => stripslashes(strip_tags($this['ClientName'])),
            'ClientSurname' => stripslashes(strip_tags($this['ClientSurname'])),
            'ClientPhoneNumber' => stripslashes(strip_tags($this['ClientPhoneNumber'])),
            'reservation_starts' => stripslashes(strip_tags($this['reservation_starts'])),
            'reservation_ends' => stripslashes(strip_tags($this['reservation_ends']))]);
    }
}
