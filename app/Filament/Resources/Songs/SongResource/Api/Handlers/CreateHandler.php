<?php
namespace App\Filament\Resources\Songs\SongResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Songs\SongResource;
use App\Filament\Resources\Songs\SongResource\Api\Requests\CreateSongRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = SongResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Song
     *
     * @param CreateSongRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateSongRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}