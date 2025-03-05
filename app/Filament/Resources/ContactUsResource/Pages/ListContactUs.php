<?php

namespace App\Filament\Resources\ContactUsResource\Pages;

use App\Filament\Resources\ContactUsResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ViewRecord\Concerns\Translatable;

class ListContactUs extends ListRecords
{
    use Translatable;
    protected static string $resource = ContactUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
