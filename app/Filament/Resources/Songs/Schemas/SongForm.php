<?php

namespace App\Filament\Resources\Songs\Schemas;

use App\Models\Categories;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SongForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Song Info')
                    ->description('Basic details about the song')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('duration')
                                    ->label('Duration (mm:ss)')
                                    ->required(),
                                TextInput::make('play_count')
                                    ->label('Play Count')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),

                Section::make('Relations')
                    ->description('Assign song to artist, album and category')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('category_id')
                                    ->label('Category')
                                    ->options(fn() => Categories::pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                                Select::make('artist_id')
                                    ->label('Artist')
                                    ->relationship('artist', 'name')
                                    ->native(false)
                                    ->required(),
                                Select::make('album_id')
                                    ->label('Album')
                                    ->relationship('album', 'title')
                                    ->native(false)
                                    ->required(),
                            ]),
                    ]),

                Section::make('Files')
                    ->description('Upload cover and audio file')
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            FileUpload::make('cover_image')
                            ->label('Cover Image')
                            ->disk('public')
                            ->directory('image')
                            ->image()
                            ->required(),
                        FileUpload::make('file_music')
                            ->label('File Music')
                            ->disk('public')
                            ->directory('music file')
                            ->acceptedFileTypes(['audio/mpeg'])
                            ->required(),
                        ])
                    ]),

                Section::make('Lyrics')
                    ->collapsible()
                    ->schema([
                        RichEditor::make('lyrics')
                            ->label('Lyrics')
                            ->columnSpanFull()
                            ->required(),
                    ]),
            ]);
    }
}

