<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterDetailResource\Pages;
use App\Filament\Resources\FooterDetailResource\RelationManagers;
use App\Models\FooterDetail;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterDetailResource extends Resource
{
    use Translatable;

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

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('section')
                    ->options([
                        'contact' => 'Contact',
                        'about' => 'About',
                        'image' => 'Image',
                        'copy_right' => 'Copyright',
                    ])
                    ->required(),

                TextInput::make('title')
                    ->maxLength(255)
                    ->nullable(),

                TextInput::make('content')
                    ->label('Content')
                    ->required(),

                Select::make('type')
                    ->options([
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'address' => 'Address',
                        'link' => 'Link',
                        'copy_right' => 'Copyright',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('content')->label('Content'),
                TextColumn::make('type')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
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
