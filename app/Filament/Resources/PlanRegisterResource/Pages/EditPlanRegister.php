<?php

namespace App\Filament\Resources\PlanRegisterResource\Pages;

use App\Filament\Resources\PlanRegisterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanRegister extends EditRecord
{
    protected static string $resource = PlanRegisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
