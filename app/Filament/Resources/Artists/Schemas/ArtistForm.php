<?php

namespace App\Filament\Resources\Artists\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class ArtistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Artist Info')
                    ->description('Add or edit artist details')
                    ->schema([
                        FileUpload::make('cover_image')
                            ->label('Avatar')
                            ->image()
                            ->required(),
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                    ])
                    ->columnSpanFull()

            ]);
    }
}
