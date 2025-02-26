<?php

namespace App\Filament\Resources\UpcomingCourseResource\Pages;

use App\Filament\Resources\UpcomingCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUpcomingCourses extends ListRecords
{
    protected static string $resource = UpcomingCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
