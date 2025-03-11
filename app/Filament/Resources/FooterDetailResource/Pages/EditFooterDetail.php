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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        \Log::info('Edit Form Data:', $data); // Debugging

        $data['section'] = $data['section'] ?? null; // Default to null if missing

        if (isset($data['section']) && $data['section'] === 'image' && isset($data['image'])) {
            $data['content'] = $data['image'];
            unset($data['image']);
        }

        return $data;
    }
    function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
