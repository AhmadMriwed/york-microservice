<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Filament\Resources\RegistrationResource\Pages;
use App\Filament\Resources\RegistrationResource\RelationManagers;
use App\Models\Registration;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationGroup():? string
    {
        return __('Registration Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Registrations');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')
                    ->label('Full Name')
                    ->maxLength(255)
                    ->required(),

                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->maxLength(15)
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255)
                    ->required(),

                Select::make('gender')
                    ->label('Gender')
                    ->options(Gender::class),

                Textarea::make('address')
                    ->label('Address')
                    ->nullable(),

                Textarea::make('notes')
                    ->label('Notes')
                    ->nullable(),

                TextInput::make('course_id')
                    ->label('Course Id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course_id')
                    ->label('Course_Id')
                    ->sortable(),

                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('address')
                    ->label('Address')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('notes')
                    ->label('Notes')
                    ->limit(30)
                    ->searchable(),

                TextColumn::make('gender')
                    ->label('Gender')
                    ->sortable(),



                TextColumn::make('created_at')
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
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
        ];
    }
}
