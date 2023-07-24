<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    use Translatable;
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationGroup = 'regions';

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }
    protected static function getNavigationLabel(): string
    {
        return trans('lang.countries');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->label(trans('lang.name'))

                    ->required()
                    ->unique(ignoreRecord: true),


                Forms\Components\TextInput::make('code')
                    ->label('code')
                    ->label(trans('lang.code'))

                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('phonecode')
                    ->label('phone code')
                    ->label(trans('lang.phone code'))

                    ->required()
                    ->unique(ignoreRecord: true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(trans('lang.name'))

                ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('code')
                ->label(trans('lang.code'))

                ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phonecode')
                ->label(trans('lang.phone code'))


                ->sortable()->searchable(),
                //
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
