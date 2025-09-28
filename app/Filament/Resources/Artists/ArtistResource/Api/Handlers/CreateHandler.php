<?php
namespace App\Filament\Resources\Artists\ArtistResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Artists\ArtistResource;
use App\Filament\Resources\Artists\ArtistResource\Api\Requests\CreateArtistRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = ArtistResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Artist
     *
     * @param CreateArtistRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateArtistRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}