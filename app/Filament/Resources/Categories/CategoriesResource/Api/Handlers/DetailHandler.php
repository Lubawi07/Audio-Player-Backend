<?php

namespace App\Filament\Resources\Categories\CategoriesResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Categories\CategoriesResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Categories\CategoriesResource\Api\Transformers\CategoriesTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = CategoriesResource::class;

     // For public api if you dont have authentication and you get data for free
    public static bool $public = true;


    /**
     * Show Categories
     *
     * @param Request $request
     * @return CategoriesTransformer
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

        return new CategoriesTransformer($query);
    }
}
