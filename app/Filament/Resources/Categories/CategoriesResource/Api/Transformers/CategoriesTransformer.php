<?php
namespace App\Filament\Resources\Categories\CategoriesResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Categories;

/**
 * @property Categories $resource
 */
class CategoriesTransformer extends JsonResource
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
            'name' => $this->name,
        ];
    }
}
