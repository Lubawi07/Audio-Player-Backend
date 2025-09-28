<?php
namespace App\Filament\Resources\Albums\AlbumResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Albums\AlbumResource;
use Illuminate\Routing\Router;


class AlbumApiService extends ApiService
{
    protected static string | null $resource = AlbumResource::class;

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
