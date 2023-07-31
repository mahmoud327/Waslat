<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';




    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }


    protected static function getNavigationLabel(): string
    {
        return trans('lang.categories.categories');
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make()->schema([

                    //
                    Toggle::make('active')
                        ->label(trans('lang.categories.active')),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->label(trans('lang.image'))
                        ->collection('categories'),


                    Forms\Components\TextInput::make('title')
                        ->label(trans('lang.categories.title'))

                        ->required()
                        ->unique(ignoreRecord: true),


                    RichEditor::make('description')
                        ->label(trans('lang.categories.description'))

                        ->required(),
                ])




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title')->sortable()
                    ->label(trans('lang.categories.title'))
                    ->searchable(),





                ToggleColumn::make('active')
                    ->label(trans('lang.categories.active'))



            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
