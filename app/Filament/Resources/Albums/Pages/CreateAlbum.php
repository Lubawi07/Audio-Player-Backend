<?php

namespace App\Filament\Resources\Albums\Pages;

use App\Filament\Resources\Albums\AlbumResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAlbum extends CreateRecord
{
    protected static string $resource = AlbumResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Album registered')
            ->body('The album has been created successfully.');
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('Album registered')
            ->body('The album has been created successfully.')
            ->sendToDatabase(auth()->user());
    }
}
