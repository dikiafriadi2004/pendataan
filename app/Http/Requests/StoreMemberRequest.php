<?php

namespace App\Http\Requests;

use App\Models\Member;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nik' => ['required', 'string', 'max:255', 'unique:'.Member::class],
            'name' => ['required', 'string', 'max:255'],
            'tps' => ['string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:255'],
            'village_id' => ['required', 'integer'],
        ];
    }
}
