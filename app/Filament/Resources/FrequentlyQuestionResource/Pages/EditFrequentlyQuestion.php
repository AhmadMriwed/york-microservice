<?php

namespace App\Filament\Resources\FrequentlyQuestionResource\Pages;

use App\Filament\Resources\FrequentlyQuestionResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditFrequentlyQuestion extends EditRecord
{
    use Translatable;
    protected static string $resource = FrequentlyQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
