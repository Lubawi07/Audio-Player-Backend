<?php

namespace App\Filament\Resources\Artists\Pages;

use App\Filament\Resources\Artists\ArtistResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateArtist extends CreateRecord
{
    protected static string $resource = ArtistResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Artist registered')
            ->body('The artist has been created successfully.');
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('Artist registered')
            ->body('The artist has been created successfully.')
            ->sendToDatabase(auth()->user());
    }
}
