<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttackerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ipv4'        => ['required'],
            'type'        => ['required'],
            'description' => ['required'],
            'country'     => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
