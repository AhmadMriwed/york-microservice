<?php

namespace App\Filament\Resources\FooterDetailResource\Pages;

use App\Filament\Resources\FooterDetailResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditFooterDetail extends EditRecord
{
    use Translatable;
    protected static string $resource = FooterDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
