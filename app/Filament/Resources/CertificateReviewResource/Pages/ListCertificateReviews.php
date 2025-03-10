<?php

namespace App\Filament\Resources\CertificateReviewResource\Pages;

use App\Filament\Resources\CertificateReviewResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListCertificateReviews extends ListRecords
{
    use Translatable;
    protected static string $resource = CertificateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
