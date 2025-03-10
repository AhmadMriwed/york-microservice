<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpcomingCourseResource\Pages;
use App\Filament\Resources\UpcomingCourseResource\RelationManagers;
use App\Models\UpcomingCourse;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UpcomingCourseResource extends Resource
{
    use Translatable;
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
        return $form->schema([
            Section::make(__('Slider Details'))
                ->schema([
                    FileUpload::make('img')
                        ->label(__('Image'))
                        ->image()
                        ->disk('public')
                        ->directory('UpComingCourse/images')
                        ->maxSize(2048),

                    TextInput::make('title')
                        ->label(__('Title'))
                        ->required()
                        ->maxLength(255),

                    RichEditor::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull(),

                    DatePicker::make('course_date')
                        ->label(__('Course Date'))
                        ->required(),

                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img')
                    ->disk('public')
                    ->label(__('Image'))
                    ->size(50),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->limit(30)
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->label(__('Description'))
                    ->limit(50)
                    ->sortable()
                    ->html(),

                TextColumn::make('course_date')->label('Course Date')
                    ->sortable(),

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
