<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterDetailResource\Pages;
use App\Filament\Resources\FooterDetailResource\RelationManagers;
use App\Models\FooterDetail;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

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
                    ->reactive() // Makes the form update dynamically based on selection
                    ->required(),

                TextInput::make('title')
                    ->maxLength(255)
                    ->nullable(),

                Forms\Components\RichEditor::make('content')
                    ->label('Content')
                    ->hidden(fn ($get) => $get('section') === 'image') // Hide content when "image" is selected
                    ->required(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('footer/images')
                    ->hidden(fn ($get) => $get('section') !== 'image') // Show only if "image" is selected
                    ->required(fn ($get) => $get('section') === 'image') // Require only if "image" is selected
                    ->maxSize(2048),
            ]);

    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),

                TextColumn::make('content')
                    ->label('Content')
                    ->formatStateUsing(function ($state) {
                        if ($state && Str::startsWith($state, 'footer/images/')) {
                            return '<img src="' . asset('storage/' . $state) . '" alt="Image" width="50">';
                        }
                        return $state;
                    })
                    ->html(),
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
