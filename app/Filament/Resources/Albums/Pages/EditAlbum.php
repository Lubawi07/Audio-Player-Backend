<?php

namespace App\Filament\Resources\Albums\Pages;

use App\Filament\Resources\Albums\AlbumResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditAlbum extends EditRecord
{
    protected static string $resource = AlbumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Album updated')
            ->body('The album has been saved successfully.');
    }

    protected function afterSave(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('Album updated')
            ->body('The album has been saved successfully.')
            ->sendToDatabase(auth()->user());
    }
}
