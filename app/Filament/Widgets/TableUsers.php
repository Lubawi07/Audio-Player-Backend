<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Str;

class TableUsers extends TableWidget
{
    protected static ?string $heading = 'Latest Users';
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => User::query()->latest())
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('name')
                ->description(fn ($record) => Str::limit($record->email, 50))
                ->label('Users'),
                TextColumn::make('created_at')
                ->label('Date Created')
                ->since(),
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
