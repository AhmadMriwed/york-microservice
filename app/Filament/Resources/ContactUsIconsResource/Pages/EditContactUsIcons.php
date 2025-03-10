<?php

namespace App\Filament\Resources\ContactUsIconsResource\Pages;

use App\Filament\Resources\ContactUsIconsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactUsIcons extends EditRecord
{
    protected static string $resource = ContactUsIconsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
