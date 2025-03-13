<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Http\Clients\CategoryClient;
use App\Models\Category;
use CactusGalaxy\FilamentAstrotomic\Resources\Concerns\ResourceTranslatable;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\Action;


class CategoryResource extends Resource
{
    use ResourceTranslatable;
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('img')->label('Image'),
                // Forms\Components\TextInput::make('imgicon')->label('Icon Image'),
                Tabs::make('translations')->tabs([
                    Tab::make('English')->schema([
                        TextInput::make('en.title')->label('Title (English)')->required(),
                        RichEditor::make('en.description')->label('Description (English)') ->columnSpanFull(),
                    ]),
                    Tab::make('Arabic')->schema([
                        TextInput::make('ar.title')->label('Title (Arabic)')->required(),
                        RichEditor::make('ar.description')->label('Description (Arabic)') ->columnSpanFull(),
                    ]),
                ]),

            //     Tabs::make('images')->tabs([
            //         Tab::make('images')->schema([
            //         FileUpload::make('img')  
            //         ->label(__('Image'))
            //             ->image()
            //             ->disk('public')
            //             ->directory('categories/images')
            //             ->maxSize(2048)
            // ,
            //         FileUpload::make('imgicon')  
            //         ->label(__('image_icon'))
            //             ->image()
            //             ->disk('public')
            //             ->directory('categories/icons')
            //             ->maxSize(1024),
            //         ])
            //     ]),
               
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                ,
                    ImageColumn::make('img') 
                    ->label(__('Image'))
                    ->disk('public') 
                    ->width(50)
                    ->height(50),
                    // ->label('Image'),
                   
                ImageColumn::make('imgicon')
                ->label(__('image_icon'))
                    ->disk('public')
                    ->width(30)
                    ->height(30),
            ])
            // ->actions([
                // Action::make('createViaApi')
                //     ->label('Create via API')
                //     ->action(function ($record) {

                //         $categoryClient = new CategoryClient();
                //         $response= $categoryClient->createCategory([
                //             'title' => $record->title,
                //             'sub_title' => $record->sub_title,
                //             'image' => $record->image,
                //         ]);
                //         error_log(json_encode($response["message"]??""));

                        // if($response["error"]) {
                        //      // إظهار رسالة خطأ
                        //      Notification::make()
                        //      ->title('فشل الإنشاء عبر API')
                        //      ->danger()
                        //      ->send();
                          
                        // } else {
                        //      // إظهار رسالة نجاح
                        //      Notification::make()
                        //      ->title('تم الإنشاء بنجاح عبر API')
                        //      ->success()
                        //      ->send();
                        // }
                        
                        // // استدعاء API endpoint لإنشاء سجل
                        // $response = Http::post('https://your-api.com/api/training-plans', [
                        //     'title' => $record->title,
                        //     'sub_title' => $record->sub_title,
                        //     // إرسال بيانات أخرى
                        // ]);

                        // if ($response->successful()) {
                        //     // إظهار رسالة نجاح
                        //     Notification::make()
                        //         ->title('تم الإنشاء بنجاح عبر API')
                        //         ->success()
                        //         ->send();
                        // } else {
                        //     // إظهار رسالة خطأ
                        //     Notification::make()
                        //         ->title('فشل الإنشاء عبر API')
                        //         ->danger()
                        //         ->send();
                        // }
                    // }),
            // ])
            ;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
