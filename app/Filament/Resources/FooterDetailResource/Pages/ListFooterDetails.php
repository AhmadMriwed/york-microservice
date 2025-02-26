<?php

namespace App\Filament\Resources\FooterDetailResource\Pages;

use App\Filament\Resources\FooterDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFooterDetails extends ListRecords
{
    protected static string $resource = FooterDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
