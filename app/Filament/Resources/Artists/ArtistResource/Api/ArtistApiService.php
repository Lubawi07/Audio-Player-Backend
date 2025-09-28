<?php
namespace App\Filament\Resources\Artists\ArtistResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Artists\ArtistResource;
use Illuminate\Routing\Router;


class ArtistApiService extends ApiService
{
    protected static string | null $resource = ArtistResource::class;

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
