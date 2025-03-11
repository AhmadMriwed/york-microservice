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

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['section'] = $data['section'] ?? null; // Default to null if missing
        if ($data['section'] === 'image' && isset($data['image'])) {
            $data['content'] = $data['image']; // Store image path in 'content'
            unset($data['image']); // Remove unnecessary image field
        }
        return $data;
    }
    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

}
