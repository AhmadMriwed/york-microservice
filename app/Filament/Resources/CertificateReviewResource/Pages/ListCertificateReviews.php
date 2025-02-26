<?php

namespace App\Filament\Resources\CertificateReviewResource\Pages;

use App\Filament\Resources\CertificateReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificateReviews extends ListRecords
{
    protected static string $resource = CertificateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
