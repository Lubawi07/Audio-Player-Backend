<?php

namespace App\Filament\Resources\Songs\Pages;

use App\Filament\Resources\Songs\SongResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateSong extends CreateRecord
{
    protected static string $resource = SongResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Song registered')
            ->body('The song has been created successfully.');
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('Song registered')
            ->body('The song has been created successfully.')
            ->sendToDatabase(auth()->user());
    }
}
