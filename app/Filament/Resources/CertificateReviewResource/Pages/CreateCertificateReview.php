<?php

namespace App\Filament\Resources\CertificateReviewResource\Pages;

use App\Filament\Resources\CertificateReviewResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateCertificateReview extends CreateRecord
{
    use Translatable;
    protected static string $resource = CertificateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

}
