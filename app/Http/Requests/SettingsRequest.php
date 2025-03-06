<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'company_address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:settings,email,' . ($this->route('setting')?->id ?? 'NULL'),
            'phone' => 'required|string|max:20',
            'location' => 'nullable|string|max:255',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'instagram_id' => 'nullable|string|max:255',
            'facebook_id' => 'nullable|string|max:255',
            'whatsapp_id' => 'nullable|string|max:255',
        ];
    }
}
