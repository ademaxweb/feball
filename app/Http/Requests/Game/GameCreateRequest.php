<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class GameCreateRequest extends FormRequest
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
            "home" => ["required", "integer", "exists:clubs,id"],
            "guest" => ["required", "integer", "exists:clubs,id"],
            "date" => ["date"],
            "home_score" => ["integer", "min:0"],
            "guest_score" => ["integer", "min:0"],
            "stadium_id" => ["integer", "exists:stadiums,id"],
            "tournament_id" => ["integer", "exists:tournaments,id"]
        ];
    }
}
