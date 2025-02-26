<?php

namespace App\Filament\Resources\FrequentlyQuestionResource\Pages;

use App\Filament\Resources\FrequentlyQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFrequentlyQuestion extends EditRecord
{
    protected static string $resource = FrequentlyQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
