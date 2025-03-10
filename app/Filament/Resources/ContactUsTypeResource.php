<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsTypeResource\Pages;
use App\Filament\Resources\ContactUsTypeResource\RelationManagers;
use App\Models\ContactUsType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactUsTypeResource extends Resource
{
    protected static ?string $model = ContactUsType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function getNavigationGroup():? string
    {
        return __('General Information');
    }

    public static function getNavigationLabel(): string
    {
        return __('Contact Us Type');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type')->label('Type')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->label('Type')
                    ->searchable(),

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
            'index' => Pages\ListContactUsTypes::route('/'),
            'create' => Pages\CreateContactUsType::route('/create'),
            'edit' => Pages\EditContactUsType::route('/{record}/edit'),
        ];
    }
}
