<?php

namespace App\Filament\Resources\UpcomingCourseResource\Pages;

use App\Filament\Resources\UpcomingCourseResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListUpcomingCourses extends ListRecords
{
    use Translatable;
    protected static string $resource = UpcomingCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
