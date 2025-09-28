<?php
namespace App\Filament\Resources\Albums\AlbumResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Albums\AlbumResource;
use App\Filament\Resources\Albums\AlbumResource\Api\Requests\CreateAlbumRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = AlbumResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Album
     *
     * @param CreateAlbumRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateAlbumRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}