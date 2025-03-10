<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FrequentlyQuestionResource\Pages;
use App\Filament\Resources\FrequentlyQuestionResource\RelationManagers;
use App\Models\FrequentlyQuestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FrequentlyQuestionResource extends Resource
{
    use Translatable;

    protected static ?string $model = FrequentlyQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup():? string
    {
        return __('Content Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Frequently Questions');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label('Question')
                    ->required(),

                Forms\Components\TextInput::make('answer')
                    ->label('Answer')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Question'), // Show English by default

                Tables\Columns\TextColumn::make('answer')
                    ->label('Answer'),
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
            'index' => Pages\ListFrequentlyQuestions::route('/'),
            'create' => Pages\CreateFrequentlyQuestion::route('/create'),
            'edit' => Pages\EditFrequentlyQuestion::route('/{record}/edit'),
        ];
    }
}
