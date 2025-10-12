<?php
namespace App\Filament\Resources\Songs\SongResource\Api\Transformers;

use App\Filament\Resources\Albums\AlbumResource\Api\Transformers\AlbumTransformer;
use App\Filament\Resources\Artists\ArtistResource\Api\Transformers\ArtistTransformer;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Songs;
use App\Filament\Resources\Categories\CategoriesResource\Api\Transformers\CategoriesTransformer;

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
            'category' => $this->whenLoaded('category', fn () => new CategoriesTransformer($this->category)),
            'artist' => $this->whenLoaded('artist', fn () => new ArtistTransformer($this->artist)),
            'album' => $this->whenLoaded('album', fn () => new AlbumTransformer($this->album)),
            'lyrics' => $this->lyrics,
            'file_music' => $this->file_music,
            'duration' => $this->duration,
            'play_count' => $this->play_count

        ];
    }
}
