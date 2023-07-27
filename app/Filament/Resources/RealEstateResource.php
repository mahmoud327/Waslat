<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealEstateResource\Pages;
use App\Filament\Resources\RealEstateResource\RelationManagers;
use App\Models\Feature;
use App\Models\FeatureList;
use App\Models\RealEstate;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RealEstateResource extends Resource
{
    protected static ?string $model = RealEstate::class;
    use Translatable;


    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make()->schema([


                    Tabs::make('Heading')
                        ->tabs([
                            Tabs\Tab::make('Genral')
                                ->label(trans('lang.genral'))

                                ->schema([

                                    RichEditor::make('description')
                                        ->label(trans('lang.real estates.description'))
                                        ->required(),


                                    Select::make('city_id')
                                        ->relationship('city', 'name')
                                        ->label(trans('lang.cities'))

                                        ->required()
                                        ->preload(),

                                    Forms\Components\TextInput::make('phone')
                                        ->label(trans('lang.phone'))
                                        ->required(),


                                    Forms\Components\TextInput::make('whatsup')
                                        ->label(trans('lang.whatsup'))
                                        ->required(),


                                    Select::make('user_id')
                                        ->relationship('user', 'name')
                                        ->label(trans('lang.users'))

                                        ->required()
                                        ->preload(),


                                    Select::make('status')
                                        ->options([
                                            0 => trans('lang.real estates.pending'),
                                            1 => trans('lang.real estates.approved'),
                                            2 => trans('lang.real estates.rejected'),
                                        ])
                                        ->label(trans('lang.real estates.status'))
                                        ->required(),

                                    Select::make('type_clinet')
                                        ->options([
                                            'broker' => trans('lang.real estates.broker'),
                                            'investor' => trans('lang.real estates.investor'),
                                            'searching_real_estate' => trans('lang.real estates.searching real estate'),
                                        ])
                                        ->label(trans('lang.real estates.type clinet'))
                                        ->required(),

                                    Select::make('purpose')
                                        ->options([
                                            'Hire'=> trans('lang.real estates.hire'),
                                            'buying' => trans('lang.real estates.buying'),
                                        ])
                                        ->label(trans('lang.real estates.purpose'))
                                        ->required(),

                                    Select::make('how_purchase')
                                        ->options([
                                            'cash'=> trans('lang.real estates.cash'),
                                            'finance' => trans('lang.real estates.finance'),
                                        ])
                                        ->label(trans('lang.real estates.how want purchase'))
                                        ->required(),




                                    // ...
                                ]),

                            Tabs\Tab::make('price')
                                ->label(trans('lang.price'))
                                ->schema([
                                    Forms\Components\TextInput::make('min_price')
                                        ->label(trans('lang.real estates.min price'))
                                        ->numeric()
                                        ->required(),


                                    Forms\Components\TextInput::make('max_price')
                                        ->label(trans('lang.real estates.max price'))
                                        ->numeric()

                                        ->required(),

                                    // ...
                                ]),

                            Tabs\Tab::make('realEstateFeatureLists')
                                ->label(trans('lang.features'))
                                ->schema([
                                    Repeater::make('realEstateFeatureLists')
                                        ->relationship()
                                        ->label(trans('lang.features'))
                                        ->schema([
                                            Select::make('feature_id')
                                                ->label(trans('lang.features'))
                                                ->options(function () {
                                                    return Feature::pluck('name', 'id')->toArray();
                                                })->required()
                                                ->reactive()
                                                ->afterStateUpdated(fn (callable $set) => $set('feature_list_id', null)),
                                            Select::make('feature_list_id')
                                                ->label(trans('lang.feature list'))

                                                ->options(function (callable $get) {
                                                    $attribite = Feature::find($get('feature_id'));
                                                    if (!$attribite) {
                                                        return FeatureList::pluck('name', 'id')->toArray();
                                                    } else {
                                                        return $attribite->LISTINGS->pluck('name', 'id')->toArray();
                                                    }
                                                })->required(),

                                        ])->columns(2),
                                ]),

                            Tabs\Tab::make('Medias')
                                ->label(trans('lang.images'))

                                ->schema([
                                    SpatieMediaLibraryFileUpload::make('images')
                                        ->label(trans('lang.images'))

                                        ->collection('images')
                                        ->multiple()


                                    // ...


                                ]),

                        ])





                ])
                //

            ]);
    }


    protected static function getNavigationLabel(): string
    {
        return trans('lang.real estates.real estates');
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('how_purchase')
                    ->label(trans('lang.real estates.how want purchase')),

                Tables\Columns\TextColumn::make('type_clinet')
                    ->label(trans('lang.real estates.type clinet')),
                //
                Tables\Columns\TextColumn::make('min_price')
                    ->label(trans('lang.real estates.min price')),
                //


                Tables\Columns\TextColumn::make('max_price')
                    ->label(trans('lang.real estates.max price'))

                    ->sortable()->searchable(),



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
            'index' => Pages\ListRealEstates::route('/'),
            'create' => Pages\CreateRealEstate::route('/create'),
            'edit' => Pages\EditRealEstate::route('/{record}/edit'),
        ];
    }
}
