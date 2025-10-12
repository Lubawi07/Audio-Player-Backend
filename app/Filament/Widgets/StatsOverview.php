<?php

namespace App\Filament\Widgets;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Categories;
use App\Models\Roles;
use App\Models\Songs;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use DB;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Albums Total', Album::count())
                ->icon('heroicon-o-folder-open')
                // ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(Album::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Artist Total', Artist::count())
                ->icon('heroicon-o-microphone')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(Artist::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Category Total', Categories::count())
                ->icon('heroicon-o-rectangle-stack')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(Categories::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Songs Total', Songs::count())
                ->icon('heroicon-o-musical-note')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(Songs::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Users Total', User::count())
                ->icon('heroicon-o-users')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(User::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Roles Total', Role::count())
                ->icon('heroicon-o-user-group')
        ];
    }

    // protected function getColumns(): int | array
    // {
    //     return 5; //Set widget in 5 items on 1 row
    // }

}
