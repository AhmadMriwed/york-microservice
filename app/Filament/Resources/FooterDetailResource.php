<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterDetailResource\Pages;
use App\Filament\Resources\FooterDetailResource\RelationManagers;
use App\Models\FooterDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterDetailResource extends Resource
{
    protected static ?string $model = FooterDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup():? string
    {
        return __('Content Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Footer Details');
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
            'index' => Pages\ListFooterDetails::route('/'),
            'create' => Pages\CreateFooterDetail::route('/create'),
            'edit' => Pages\EditFooterDetail::route('/{record}/edit'),
        ];
    }
}
