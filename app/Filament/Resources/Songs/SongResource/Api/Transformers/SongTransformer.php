<?php
namespace App\Filament\Resources\Songs\SongResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Songs;

/**
 * @property Songs $resource
 */
class SongTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return $this->resource->toArray();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover_image' => $this->cover_image,
            'category_id' => $this->category_id,
            'artist_id' => $this->artist_id,
            'album_id' => $this->album_id,
            'lyrics' => $this->lyrics,
            'file_music' => $this->file_music,
            'duration' => $this->duration,
            'play_count' => $this->play_count

        ];
    }
}
