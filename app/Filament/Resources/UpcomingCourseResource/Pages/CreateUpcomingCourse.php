<?php

namespace App\Filament\Resources\UpcomingCourseResource\Pages;

use App\Filament\Resources\UpcomingCourseResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateUpcomingCourse extends CreateRecord
{
    use Translatable;
    protected static string $resource = UpcomingCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
