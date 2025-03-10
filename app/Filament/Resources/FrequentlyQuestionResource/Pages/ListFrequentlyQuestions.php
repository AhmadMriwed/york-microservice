<?php

namespace App\Filament\Resources\FrequentlyQuestionResource\Pages;

use App\Filament\Resources\FrequentlyQuestionResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListFrequentlyQuestions extends ListRecords
{
    use Translatable;
    protected static string $resource = FrequentlyQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
