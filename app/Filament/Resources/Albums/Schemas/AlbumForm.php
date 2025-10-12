<?php

namespace App\Filament\Resources\Albums\Schemas;

use App\Models\Artist;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Album management')
                ->description('For management')
                ->schema([
                    Grid::make(2)
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        FileUpload::make('cover_image')
                            ->disk('public')
                            ->directory('image')
                            ->required(),
                        Select::make('artist_id')
                            ->relationship('artist','name')
                            ->options(Artist::all()->pluck('name', 'id'))
                            ->required(),
                        DateTimePicker::make('release_date')
                            ->native(false)
                            ->required()
                    ])
                ])
                ->columnSpanFull()
            ]);
    }
}
