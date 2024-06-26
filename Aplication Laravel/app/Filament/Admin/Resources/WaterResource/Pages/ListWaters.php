<?php

namespace App\Filament\Admin\Resources\WaterResource\Pages;

use App\Filament\Admin\Resources\WaterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWaters extends ListRecords
{
    protected static string $resource = WaterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
