<?php

namespace App\Filament\Resources\ContactUsIconsTypeResource\Pages;

use App\Filament\Resources\ContactUsIconsTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactUsIconsType extends EditRecord
{
    protected static string $resource = ContactUsIconsTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
