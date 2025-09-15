<?php

namespace App\Filament\Resources\Albums\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AlbumsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('ID')
                ->sortable(),
                ImageColumn::make('cover_image')
                ->circular()
                ->size(50)
                ->label('Thumbnail'),
                TextColumn::make('title')
                ->label('Title')
                ->searchable(),
                TextColumn::make('artist.name')
                ->label('Artist'),
                TextColumn::make('release_date')
                ->dateTime(),
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
