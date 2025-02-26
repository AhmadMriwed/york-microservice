<?php

namespace App\Filament\Resources\UpcomingCourseResource\Pages;

use App\Filament\Resources\UpcomingCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUpcomingCourse extends EditRecord
{
    protected static string $resource = UpcomingCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
