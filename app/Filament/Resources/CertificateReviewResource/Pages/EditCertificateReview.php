<?php

namespace App\Filament\Resources\CertificateReviewResource\Pages;

use App\Filament\Resources\CertificateReviewResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditCertificateReview extends EditRecord
{
    use Translatable;
    protected static string $resource = CertificateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
