<?php

namespace App\Filament\Resources\AboutUsResource\Pages;

use App\Filament\Resources\AboutUsResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;



class CreateAboutUs extends CreateRecord
{
    use Translatable;
    protected static string $resource = AboutUsResource::class;
    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
