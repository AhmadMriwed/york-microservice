<?php

namespace App\Filament\Resources\FooterDetailResource\Pages;

use App\Filament\Resources\FooterDetailResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListFooterDetails extends ListRecords
{
    use Translatable;
    protected static string $resource = FooterDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
