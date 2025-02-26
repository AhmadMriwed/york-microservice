<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountResource\Pages;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Models\Discount;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function getNavigationGroup():? string
    {
        return __('Courses Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Discounts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->label('Code')
                    ->unique()
                    ->maxLength(9)
                    ->required(),

                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('discount_percentage')
                    ->label('Discount Percentage')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('discount_fee')
                    ->label('Discount Fee')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('End Date')
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Code')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')->label('Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('discount_percentage')->label('Discount Percentage')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('discount_fee')->label('Discount Fee')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_date')->label('Start Date')
                    ->sortable(),
                TextColumn::make('end_date')->label('End Date')
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
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
