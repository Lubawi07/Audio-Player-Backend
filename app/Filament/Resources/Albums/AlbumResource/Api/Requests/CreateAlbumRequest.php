<?php

namespace App\Filament\Resources\Albums\AlbumResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlbumRequest extends FormRequest
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
			'title' => 'required',
			'cover_image' => 'required',
			'artist_id' => 'required',
			'release_date' => 'required|date'
		];
    }
}
