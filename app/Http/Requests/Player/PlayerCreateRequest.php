<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class PlayerCreateRequest extends FormRequest
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
            "name" => ["required", "string"],
            "surname" => ["required", "string"],
            "birth" => ["required", "date"],
            "number" => ["integer", "min:0", "max:100"],
            "position_id" => ["required", "integer", "exists:positions,id"],
            "club_id" => ["required", "integer", "exists:clubs,id"],
            "country_id" => ["required", "integer", "exists:countries,id"]
        ];
    }
}
