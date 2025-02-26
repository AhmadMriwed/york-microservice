<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateReviewResource\Pages;
use App\Filament\Resources\CertificateReviewResource\RelationManagers;
use App\Models\CertificateReview;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificateReviewResource extends Resource
{
    protected static ?string $model = CertificateReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationGroup():? string
    {
        return __('Certificate Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Certificate Review');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('certificate_code')
                    ->label('Certificate Code')
                    ->maxLength(9)
                    ->required()
                    ->unique(),

                TextInput::make('first_name')
                    ->label('First Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('message')
                    ->label('Message')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('certificate_code')->label('Certificate Code')->searchable(),
                TextColumn::make('first_name')->label('First Name')->sortable()->searchable(),
                TextColumn::make('last_name')->label('Last Name')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                TextColumn::make('message')->label('Message')->limit(50),
                TextColumn::make('created_at')->label('Submitted At')->dateTime()->sortable(),

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
            'index' => Pages\ListCertificateReviews::route('/'),
            'create' => Pages\CreateCertificateReview::route('/create'),
            'edit' => Pages\EditCertificateReview::route('/{record}/edit'),
        ];
    }
}
