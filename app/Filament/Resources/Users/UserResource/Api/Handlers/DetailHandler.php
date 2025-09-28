<?php

namespace App\Filament\Resources\Users\UserResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Users\UserResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Users\UserResource\Api\Transformers\UserTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = UserResource::class;
    
    // For public api if you dont have authentication and you get data for free
    public static bool $public = true;

    /**
     * Show User
     *
     * @param Request $request
     * @return UserTransformer
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

        return new UserTransformer($query);
    }
}
