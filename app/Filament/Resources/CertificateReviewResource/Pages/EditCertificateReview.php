<?php

namespace App\Filament\Resources\CertificateReviewResource\Pages;

use App\Filament\Resources\CertificateReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCertificateReview extends EditRecord
{
    protected static string $resource = CertificateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
