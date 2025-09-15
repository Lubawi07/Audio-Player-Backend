<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Songs;

class TableSongs extends TableWidget
{

    protected static ?string $heading = 'Latest Songs';
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Songs::query())
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                ImageColumn::make('cover_image')
                    ->size(50)
                    ->label('Image'),
                TextColumn::make('artist.name')
                ->label('Artist'),
                TextColumn::make('category.name')
                ->label('Category'),
                TextColumn::make('play_count')
                ->label('Play Count'),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
