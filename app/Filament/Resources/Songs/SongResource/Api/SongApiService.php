<?php
namespace App\Filament\Resources\Songs\SongResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Songs\SongResource;
use Illuminate\Routing\Router;


class SongApiService extends ApiService
{
    protected static string | null $resource = SongResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
