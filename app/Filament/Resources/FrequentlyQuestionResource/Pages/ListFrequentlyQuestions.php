<?php

namespace App\Filament\Resources\FrequentlyQuestionResource\Pages;

use App\Filament\Resources\FrequentlyQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFrequentlyQuestions extends ListRecords
{
    protected static string $resource = FrequentlyQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
