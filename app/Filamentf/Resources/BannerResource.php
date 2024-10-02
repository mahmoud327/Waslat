<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    use Translatable;

    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }


    protected static function getNavigationLabel(): string
    {
        return trans('lang.banners.banners');
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([

                    SpatieMediaLibraryFileUpload::make('image')
                        ->label(trans('lang.image'))
                        ->collection('banners'),

                    Forms\Components\TextInput::make('title')
                        ->label(trans('lang.banners.title'))

                        ->required()
                        ->unique(ignoreRecord: true),


                    RichEditor::make('description')
                        ->label(trans('lang.banners.description'))

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
                    ->label(trans('lang.banners.title'))
                    ->searchable(),



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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanners::route('/create'),
            'edit' => Pages\EditBanners::route('/{record}/edit'),
        ];
    }
}
