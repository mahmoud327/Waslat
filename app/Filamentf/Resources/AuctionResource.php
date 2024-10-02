<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuctionResource\Pages;
use App\Filament\Resources\AuctionResource\RelationManagers;
use App\Models\Auction;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuctionResource extends Resource
{
    use Translatable;

    protected static ?string $model = Auction::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationLabel(): string
    {
        return trans('lang.auctions.auctions');
    }




    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Forms\Components\FileUpload::make('image')
                        ->label(trans('lang.image'))
                        ->required(),

                    Forms\Components\TextInput::make('name')
                        ->label(trans('lang.auctions.name'))
                        ->required(),

                    Forms\Components\TextInput::make('area')
                        ->label(trans('lang.auctions.area'))
                        ->required(),

                    Forms\Components\TextInput::make('phone')
                        ->label(trans('lang.auctions.phone'))
                        ->required(),



                    Forms\Components\TextInput::make('start_price')
                        ->label(trans('lang.auctions.start_price'))
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('before_price')
                        ->label(trans('lang.auctions.before price'))
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('before_price')
                        ->label(trans('lang.auctions.before price'))
                        ->numeric()
                        ->required(),



                    Forms\Components\TextInput::make('value_added_tax')
                        ->label('value added tax')
                        ->label(trans('lang.auctions.value added tax'))

                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('commission')
                        ->label(trans('lang.auctions.commission'))

                        ->numeric()
                        ->required(),


                    Forms\Components\TextInput::make('after_price')
                        ->label('after price')
                        ->label(trans('lang.auctions.after price'))

                        ->numeric()
                        ->required(),


                        Select::make('seller_type')
                        ->options([
                            'enforcement'=> trans('lang.auctions.enforcement'),
                            'zaman' =>  trans('lang.auctions.zaman'),
                        ])
                        ->label(trans('lang.auctions.seller type'))
                        ->required(),

                    Select::make('city_id')
                        ->relationship('city', 'name')
                        ->label(trans('lang.auctions.city'))

                        ->searchable()
                        ->required(),

                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->label(trans('lang.auctions.user'))

                        ->preload()
                        ->required(),

                    DatePicker::make('start_date')
                        ->required()
                        ->label(trans('lang.auctions.start date')),



                    RichEditor::make('description')
                        ->label(trans('lang.auctions.description'))

                        ->required(),



                        SpatieMediaLibraryFileUpload::make('images')
                        ->label(trans('lang.images'))

                        ->collection('auctions')
                        ->multiple()


                ])
                //

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->sortable()
                ->label(trans('lang.auctions.name'))
                ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                ->sortable()
                ->label(trans('lang.auctions.phone'))
                ->searchable(),
                Tables\Columns\TextColumn::make('before_price')
                ->sortable()
                ->label(trans('lang.auctions.before price'))

                ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                ->sortable()
                ->label(trans('lang.auctions.start date'))
                ->searchable(),
                Tables\Columns\TextColumn::make('value_added_tax')
                ->sortable()
                ->label(trans('lang.auctions.value added tax'))
                ->searchable(),
                Tables\Columns\TextColumn::make('commission')
                ->sortable()
                ->label(trans('lang.auctions.commission'))

                ->searchable(),

                Tables\Columns\TextColumn::make('after_price')
                ->sortable()
                ->label(trans('lang.auctions.after price'))

                ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAuctions::route('/'),
            'create' => Pages\CreateAuction::route('/create'),
            'edit' => Pages\EditAuction::route('/{record}/edit'),
        ];
    }
}
