<?php

namespace App\Filament\Resources\Songs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Str;

class SongsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('ID')
                ->rowIndex()
                ->sortable(),
                ImageColumn::make('cover_image')
                ->size(50)
                ->square()
                ->disk('public')
                ->label('Songs Cover'),
                TextColumn::make('title')
                ->label('Songs')
                ->description(fn ($record) => Str::limit($record->file_music, 50))
                ->searchable(),
                TextColumn::make('category.name')
                ->label('Category'),
                TextColumn::make('artist.name')
                ->label('Artist'),
                TextColumn::make('album.title')
                ->label('Album'),
                TextColumn::make('lyrics')
                // Remove html tag
                ->formatStateUsing(fn ($state) => strip_tags($state))
                ->label('Lyrics')
                ->limit(50)
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('duration')
                ->label('Duration'),
                TextColumn::make('play_count')
                ->label('Play Count'),
                TextColumn::make('created_at')
                ->label('Date Created')
                ->dateTime(),
                TextColumn::make('updated_at')
                ->label('Last Updated')
                ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
