<?php

namespace EscolaLms\Tags\Http\Request;

use EscolaLms\Tags\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class TagRemoveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create', Tag::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'tags' => 'required|array',
        ];
    }
}
