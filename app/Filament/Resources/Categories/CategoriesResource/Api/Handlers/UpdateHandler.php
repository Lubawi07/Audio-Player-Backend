<?php
namespace App\Filament\Resources\Categories\CategoriesResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Categories\CategoriesResource;
use App\Filament\Resources\Categories\CategoriesResource\Api\Requests\UpdateCategoriesRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = CategoriesResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Categories
     *
     * @param UpdateCategoriesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateCategoriesRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}