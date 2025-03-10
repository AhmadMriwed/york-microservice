<?php

namespace App\Filament\Resources\ContactUsIconsResource\Pages;

use App\Filament\Resources\ContactUsIconsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactUsIcons extends ListRecords
{
    protected static string $resource = ContactUsIconsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
