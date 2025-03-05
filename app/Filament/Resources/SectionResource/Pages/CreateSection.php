<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateSection extends CreateRecord
{
    use Translatable;
    protected static string $resource = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
