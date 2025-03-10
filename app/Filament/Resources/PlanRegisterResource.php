<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanRegisterResource\Pages;
use App\Filament\Resources\PlanRegisterResource\RelationManagers;
use App\Models\PlanRegister;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanRegisterResource extends Resource
{
    protected static ?string $model = PlanRegister::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup():? string
    {
        return __('Registration Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Plan Register');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('training_plan_id')
                    ->label('Training Plan ID')
                    ->numeric()
                    ->nullable(),

                Forms\Components\TextInput::make('full_name')
                    ->label('Full Name')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->maxLength(15)
                    ->tel()
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('training_plan_id')
                    ->label('Training Plan ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registered At')
                    ->dateTime()
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
            'index' => Pages\ListPlanRegisters::route('/'),
            'create' => Pages\CreatePlanRegister::route('/create'),
            'edit' => Pages\EditPlanRegister::route('/{record}/edit'),
        ];
    }
}
