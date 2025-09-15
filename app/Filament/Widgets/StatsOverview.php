<?php

namespace App\Filament\Widgets;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Categories;
use App\Models\Songs;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Albums Total', Album::count())
            ->icon('heroicon-o-folder-open')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->descriptionColor( 'success')
            ->description(Album::whereDate('created_at', '>=', now()->subWeek())->count(). ' new this week'),
            Stat::make('Artist Total', Artist::count())
            ->icon('heroicon-o-microphone')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->descriptionColor( 'success')
            ->description(Artist::whereDate('created_at', '>=', now()->subWeek())->count(). ' new this week'),
            Stat::make('Category Total', Categories::count())
            ->icon('heroicon-o-rectangle-stack')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->descriptionColor( 'success')
            ->description(Categories::whereDate('created_at', '>=', now()->subWeek())->count(). ' new this week'),
            Stat::make('Songs Total', Songs::count())
            ->icon('heroicon-o-musical-note')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->descriptionColor( 'success')
            ->description(Songs::whereDate('created_at', '>=', now()->subWeek())->count(). ' new this week')
        ];
    }
}
