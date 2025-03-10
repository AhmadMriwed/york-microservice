<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionTypeResource\Pages;
use App\Filament\Resources\SectionTypeResource\RelationManagers;
use App\Models\SectionType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionTypeResource extends Resource
{
    protected static ?string $model = SectionType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function getNavigationGroup():? string
    {
        return __('Content Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Section Type');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Section Type Details')
                ->schema([
                    TextInput::make('type')
                        ->label('Type')
                        ->required()
                        ->maxLength(50)
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label(__('Type'))
                    ->sortable()
                    ->searchable()
                    ->limit(30),
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
            'index' => Pages\ListSectionTypes::route('/'),
            'create' => Pages\CreateSectionType::route('/create'),
            'edit' => Pages\EditSectionType::route('/{record}/edit'),
        ];
    }
}
