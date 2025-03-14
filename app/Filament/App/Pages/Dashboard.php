<?php

declare(strict_types = 1);

namespace App\Filament\App\Pages;

use App\Filament\Actions\{SubscribePlanAction};
use App\Settings\ThemeSettings;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';    
    
    public function getWidgets(): array
    {
        return Filament::getWidgets();
    }
}
