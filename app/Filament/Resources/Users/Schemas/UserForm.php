<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Info')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                ->label('Name')
                                ->required()
                                ->prefixIcon('heroicon-m-user'),
                                TextInput::make('email')
                                ->label('Email')
                                ->required()
                                ->prefixIcon('heroicon-m-envelope'),
                                Select::make('roles')
                                    ->label('Roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->required()
                                    ->searchable(),
                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required()
                                    ->revealable()

                            ])
                    ])
                    ->columnSpanFull()
            ]);
    }
}
