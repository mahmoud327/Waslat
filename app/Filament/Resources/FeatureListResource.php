<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeatureListResource\Pages;
use App\Filament\Resources\FeatureListResource\RelationManagers;
use App\Models\FeatureList;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeatureListResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }

    protected static ?string $model = FeatureList::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static function getNavigationLabel(): string
    {
        return trans('lang.feature list');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->label(trans('lang.email'))

                ->required()
                ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->label(trans('lang.name'))

                ->sortable()->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListFeatureLists::route('/'),
            'create' => Pages\CreateFeatureList::route('/create'),
            'edit' => Pages\EditFeatureList::route('/{record}/edit'),
        ];
    }
}
