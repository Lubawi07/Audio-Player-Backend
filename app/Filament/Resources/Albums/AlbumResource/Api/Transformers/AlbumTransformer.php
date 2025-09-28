<?php
namespace App\Filament\Resources\Albums\AlbumResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Album;

/**
 * @property Album $resource
 */
class AlbumTransformer extends JsonResource
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
            'artist_id' => $this->artist_id,
            'release_date' => $this->release_date

        ];
    }
}
