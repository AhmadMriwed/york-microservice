<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsIconsResource\Pages;
use App\Filament\Resources\ContactUsIconsResource\RelationManagers;
use App\Models\ContactUsIcons;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactUsIconsResource extends Resource
{
    protected static ?string $model = ContactUsIcons::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function getNavigationGroup():? string
    {
        return __('General Information');
    }

    public static function getNavigationLabel(): string
    {
        return __('Contact Us Icons');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                select::make('type_id')->label('Type Id')
                    ->relationship('type', 'type')
                ->required(),

                TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->maxLength(4096)
                    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ContactUsIconsType.type')
                    ->label(__('Type'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('url')->limit(50),
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
            'index' => Pages\ListContactUsIcons::route('/'),
            'create' => Pages\CreateContactUsIcons::route('/create'),
            'edit' => Pages\EditContactUsIcons::route('/{record}/edit'),
        ];
    }
}
