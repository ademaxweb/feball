<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class ManagerUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["string"],
            "surname" => ["string"],
            "birth" => ["date"],
            "country_id" => ["integer", "exists:countries,id"],
            "club_id" => ["integer", "exists:clubs,id"]
        ];
    }
}
