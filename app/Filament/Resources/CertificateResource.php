<?php

namespace App\Filament\Resources;

use App\Exports\CesExport;
use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;
use App\Imports\CertificatesImport;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationGroup():? string
    {
        return __('Certificate Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('Certificate');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Certificate Details')->schema([
                    TextInput::make('certificate_id')
                        ->label('Certificate Code')
                        ->unique()
                        ->maxLength(9)
                        ->required(),

                    TextInput::make('trainer_full_name')
                        ->label('Trainer Name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    FileUpload::make('trainer_img')
                        ->label('Trainer Image')
                        ->image()
                        ->disk('public')
                        ->directory('trainers')
                        ->maxSize(2048)
                        ->columnSpanFull(),

                    FileUpload::make('certificate_img')
                        ->label('Certificate Image')
                        ->image()
                        ->disk('public')
                        ->directory('certificates')
                        ->maxSize(2048)
                        ->columnSpanFull(),

                    DatePicker::make('valid_from')
                        ->label('Valid From')
                        ->required(),

                    DatePicker::make('valid_to')
                        ->label('Valid To')
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('certificate_id')->label('Certificate Code')->sortable()->searchable(),
                ImageColumn::make('certificate_img')->label('Certificate Image')
                    ->disk('public')
                    ->width(50)
                    ->height(50),

                TextColumn::make('trainer_full_name')->label('Trainer Name')->sortable()->searchable(),
                ImageColumn::make('trainer_img')->label('Trainer Image')
                    ->disk('public')
                    ->width(50)
                    ->height(50),

                TextColumn::make('valid_from')->label('Valid From')->sortable(),
                TextColumn::make('valid_to')->label('Valid To')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('export')
                    ->label('Export')
                    ->icon('heroicon-o-arrow-up-tray') // Download Icon
                    ->color('primary')
                    ->requiresConfirmation()
                    ->form([
                        TextInput::make('from')
                            ->label('From ID')
                            ->numeric()
                            ->required(),
                        TextInput::make('to')
                            ->label('To ID')
                            ->numeric()
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        return Excel::download(new CesExport($data['from'], $data['to']), 'certificates.xlsx');
                    }),

                Action::make('import')
                    ->label('Import')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->form([
                        FileUpload::make('file')
                            ->label('Excel File')
                            ->disk('local') // Ensure the disk is correct
                            ->directory('imports')
                            ->acceptedFileTypes([
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/vnd.ms-excel'
                            ])
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $filePath = storage_path('app/' . $data['file']); // Get full path

                        Excel::import(new CertificatesImport($filePath), $filePath);
                    })
                    ->requiresConfirmation(),
            ])

            ->bulkActions([
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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
