<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'detection_date'         => ['required', 'date'],
            'group_notice_date'      => ['required', 'date'],
            'zav_sector_notice_date' => ['required', 'date'],
            'attacker'               => ['required', 'array'],
            'victim'                 => ['required', 'array'],
            'is_closed'              => ['required', 'boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
