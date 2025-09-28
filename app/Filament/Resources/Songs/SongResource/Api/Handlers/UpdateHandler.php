<?php
namespace App\Filament\Resources\Songs\SongResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Songs\SongResource;
use App\Filament\Resources\Songs\SongResource\Api\Requests\UpdateSongRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = SongResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Song
     *
     * @param UpdateSongRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateSongRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}