<?php

namespace App\Filament\Resources\Artists\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
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
                        Grid::make(2)
                            ->schema([
                                FileUpload::make('cover_image')
                                    ->label('Avatar')
                                    ->image()
                                    ->columnSpanFull()
                                    ->required(),
                                TextInput::make('name')
                                    ->label('Name')
                                    ->columnSpanFull()
                                    ->required(),
                            ])
                            ]),
                    Section::make('Bio Info')
                    ->collapsible()
                    ->schema([
                        Textarea::make('bio')
                            ->label('Bio')
                            ->columnSpanFull()
                            ->required(),
                    ])
            ]);
    }
}
