<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CounterResource\Pages;
use App\Filament\Resources\CounterResource\RelationManagers;
use App\Models\Counter;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CounterResource extends Resource
{
    use Translatable;

    protected static ?string $model = Counter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup():? string
    {
        return __('Content Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Counters');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('counter')
                    ->label('Counter')
                    ->required(),

                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('counter')->label('Counter'),
                TextColumn::make('title')->label('Title')
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
            'index' => Pages\ListCounters::route('/'),
            'create' => Pages\CreateCounter::route('/create'),
            'edit' => Pages\EditCounter::route('/{record}/edit'),
        ];
    }
}
