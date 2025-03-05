<?php

namespace App\Filament\Resources\FrequentlyQuestionResource\Pages;

use App\Filament\Resources\FrequentlyQuestionResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateFrequentlyQuestion extends CreateRecord
{
    use Translatable;
    protected static string $resource = FrequentlyQuestionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
