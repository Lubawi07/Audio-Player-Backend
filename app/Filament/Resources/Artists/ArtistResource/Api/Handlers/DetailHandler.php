<?php

namespace App\Filament\Resources\Artists\ArtistResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Artists\ArtistResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Artists\ArtistResource\Api\Transformers\ArtistTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = ArtistResource::class;

     // For public api if you dont have authentication and you get data for free
    public static bool $public = true;

    /**
     * Show Artist
     *
     * @param Request $request
     * @return ArtistTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');

        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new ArtistTransformer($query);
    }
}
