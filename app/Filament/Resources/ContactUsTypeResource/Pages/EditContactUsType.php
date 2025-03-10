<?php

namespace App\Filament\Resources\ContactUsTypeResource\Pages;

use App\Filament\Resources\ContactUsTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactUsType extends EditRecord
{
    protected static string $resource = ContactUsTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
