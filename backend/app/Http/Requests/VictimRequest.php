<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VictimRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ipv4'  => ['required'],
            'owner' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
