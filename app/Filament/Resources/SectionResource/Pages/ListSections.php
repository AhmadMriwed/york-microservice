<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListSections extends ListRecords
{
    use Translatable;
    protected static string $resource = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
