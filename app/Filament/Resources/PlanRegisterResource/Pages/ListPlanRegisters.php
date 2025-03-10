<?php

namespace App\Filament\Resources\PlanRegisterResource\Pages;

use App\Filament\Resources\PlanRegisterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanRegisters extends ListRecords
{
    protected static string $resource = PlanRegisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
