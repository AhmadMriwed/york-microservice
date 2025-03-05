<?php

namespace App\Filament\Resources\FooterDetailResource\Pages;

use App\Filament\Resources\FooterDetailResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;


class CreateFooterDetail extends CreateRecord
{
    use Translatable;
    protected static string $resource = FooterDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
