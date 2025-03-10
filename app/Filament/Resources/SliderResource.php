<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
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

class SliderResource extends Resource
{
    use Translatable;
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-window';

    public static function getNavigationGroup():? string
    {
        return __('Content Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Slider');
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
                        ->directory('sliders/images')
                        ->maxSize(2048),

                    TextInput::make('title')
                        ->label(__('Title'))
                        ->required()
                        ->maxLength(255)
                        ->translateLabel(),

                    RichEditor::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull()
                        ->translateLabel(),


                    TextInput::make('first_btn_text')
                        ->label(__('First Button Text'))
                        ->maxLength(255),

                    TextInput::make('first_btn_url')
                        ->label(__('First Button URL'))
                        ->maxLength(500),

                    TextInput::make('second_btn_text')
                        ->label(__('Second Button Text'))
                        ->maxLength(255),

                    TextInput::make('second_btn_url')
                        ->label(__('Second Button URL'))
                        ->maxLength(500),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
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

            TextColumn::make('first_btn_text')
                ->label(__('First Button')),

            TextColumn::make('first_btn_url')
                ->label(__('First Button URL')),

            TextColumn::make('second_btn_text')
                ->label(__('Second Button')),

            TextColumn::make('second_btn_url')
                ->label(__('Second Button URL')),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
