<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use DB;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Facades\Filament;


class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User registered')
            ->body('The user has been created successfully.');
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('User registered')
            ->body('The user has been created successfully.')
            ->sendToDatabase(auth()->user());
    }
}
