<?php
namespace App\Filament\Resources\Artists\ArtistResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Artist;

/**
 * @property Artist $resource
 */
class ArtistTransformer extends JsonResource
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
            'cover_image' => $this->cover_image,
            'name' => $this->name,
            'bio' => $this->bio,
        ];
    }
}
