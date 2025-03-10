<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionResource extends Resource
{
    use Translatable;
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    public static function getNavigationGroup():? string
    {
        return __('Content Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Section');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         Select::make('type_id')
                             ->label(__('Section Type'))
                             ->relationship('SectionType', 'type')
                             ->required(),

                         TextInput::make('title')
                             ->label(__('Title'))
                             ->required()
                             ->maxLength(255),

                         RichEditor::make('description')
                             ->label(__('Description'))
                             ->columnSpanFull(),

                         FileUpload::make('img')
                             ->label(__('Image'))
                             ->image()
                             ->disk('public')
                             ->directory('sections/images')
                             ->maxSize(2048),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('SectionType.type')
                    ->label(__('Section Type'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->label(__('Description'))
                    ->limit(50)
                    ->sortable()
                    ->html(),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
