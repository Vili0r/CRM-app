<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required','string'],
            'description' => ['required','string'],
            'deadline_at' => ['required', 'date'],
            'tenant_id' => ['required', 'exists:tenants,id'],
            'status' => ['required', new Enum(Status::class)],
        ];
    }
}
