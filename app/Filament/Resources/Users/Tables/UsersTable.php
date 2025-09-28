<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Str;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('ID')
                ->sortable(),
                TextColumn::make('name')
                ->label('Username')
                ->searchable(),
                TextColumn::make('email')
                ->icon('heroicon-m-envelope')
                ->label('Email Address'),
                TextColumn::make('roles.name')
                ->label('Role')
                ->badge()
                ->default('No Roles')
                ->color('warning'),
                TextColumn::make('created_at')
                ->label('Date Created')
                ->since(),
                TextColumn::make('updated_at')
                ->label('Last Updated')
                ->since(),
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
