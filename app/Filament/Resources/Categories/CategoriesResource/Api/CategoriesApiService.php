<?php
namespace App\Filament\Resources\Categories\CategoriesResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Categories\CategoriesResource;
use Illuminate\Routing\Router;


class CategoriesApiService extends ApiService
{
    protected static string | null $resource = CategoriesResource::class;

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
