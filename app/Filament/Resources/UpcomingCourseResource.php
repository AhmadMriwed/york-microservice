<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpcomingCourseResource\Pages;
use App\Filament\Resources\UpcomingCourseResource\RelationManagers;
use App\Models\UpcomingCourse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UpcomingCourseResource extends Resource
{
    protected static ?string $model = UpcomingCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup():? string
    {
        return __('Courses Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('UpComing Courses');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUpcomingCourses::route('/'),
            'create' => Pages\CreateUpcomingCourse::route('/create'),
            'edit' => Pages\EditUpcomingCourse::route('/{record}/edit'),
        ];
    }
}
