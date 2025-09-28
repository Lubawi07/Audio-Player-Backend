<?php

namespace App\Filament\Resources\Songs\SongResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSongRequest extends FormRequest
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
			'category_id' => 'required',
			'artist_id' => 'required',
			'album_id' => 'required',
			'lyrics' => 'required',
			'file_music' => 'required',
			'duration' => 'required',
			'play_count' => 'required'
		];
    }
}
