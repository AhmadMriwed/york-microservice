<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Filament\Resources\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

class AboutUsResource extends Resource
{
    use Translatable;
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function getNavigationGroup():? string
    {
        return __('General Information');
    }

    public static function getNavigationLabel(): string
    {
        return __('About Us');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->translateLabel(),

                RichEditor::make('description')
                    ->label('Description')
                    ->required()
                    ->columnSpanFull()
                    ->translateLabel(),

                TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->required()
                    ->maxLength(4096),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')
                ->label(__('Title'))
                ->sortable()
                ->searchable()
                ->limit(30),

            Tables\Columns\TextColumn::make('description')
                ->label(__('Description'))
                ->limit(50)
                ->html(),

            Tables\Columns\TextColumn::make('url')
                ->label(__('Website URL'))
                ->sortable()
                ->searchable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
