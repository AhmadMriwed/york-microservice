<?php

namespace App\Filament\Resources\ContactUsTypeResource\Pages;

use App\Filament\Resources\ContactUsTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactUsTypes extends ListRecords
{
    protected static string $resource = ContactUsTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
