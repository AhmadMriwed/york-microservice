<?php

namespace App\Filament\Resources\UpcomingCourseResource\Pages;

use App\Filament\Resources\UpcomingCourseResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditUpcomingCourse extends EditRecord
{
    use Translatable;
    protected static string $resource = UpcomingCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
