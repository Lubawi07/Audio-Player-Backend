<?php

namespace App\Filament\Resources\Artists\Pages;

use App\Filament\Resources\Artists\ArtistResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditArtist extends EditRecord
{
    protected static string $resource = ArtistResource::class;

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
            ->title('Artist updated')
            ->body('The artist has been saved successfully.');
    }

    protected function afterSave(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('Artist updated')
            ->body('The artist has been saved successfully.')
            ->sendToDatabase(auth()->user());
    }
}
