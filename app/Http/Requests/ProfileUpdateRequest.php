<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            'city' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date'],

            'about_me' => [
                $this->user()->role === 'tutor' ? 'required' : 'nullable',
                'string',
                'max:1000'
            ],

            'avatar' => ['nullable', 'image', 'max:2048'], // 2MB max
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        if ($this->has('email')) {
            $this->merge([
                'email' => strtolower($this->email),
            ]);
        }
    }
}
