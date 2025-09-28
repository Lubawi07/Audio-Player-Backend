<?php

namespace App\Filament\Resources\Songs\SongResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Songs\SongResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Songs\SongResource\Api\Transformers\SongTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = SongResource::class;

     // For public api if you dont have authentication and you get data for free
    public static bool $public = true;


    /**
     * Show Song
     *
     * @param Request $request
     * @return SongTransformer
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

        return new SongTransformer($query);
    }
}
