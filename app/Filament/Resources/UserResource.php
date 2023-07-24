<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Resources\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 1;


    protected static function getNavigationLabel(): string
    {
        return trans('lang.users');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->label(trans('lang.name'))

                    ->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('email')->email()
                    ->label(trans('lang.email'))


                    ->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('password')
                    ->label(trans('lang.password'))


                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(
                        static fn (null|string $state): null|string =>
                        filled($state) ? Hash::make($state) : null,
                    )->required(
                        static fn (Page $livewire): bool =>
                        $livewire instanceof CreateUser,
                    )->dehydrated(
                        static fn (null|string $state): bool =>
                        filled($state),
                    )->label(
                        static fn (Page $livewire): string => ($livewire instanceof EditUser) ? trans('lang.password') : trans('lang.password')
                    ),
                CheckboxList::make('roles')
                ->label(trans('lang.roles'))

                    ->relationship('roles', 'name')
                    ->columns(2)
                    ->helperText(trans('lang.choose any roles'))
                    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->sortable()
                    ->label(trans('lang.name'))

                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(trans('lang.email'))

                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(trans('lang.created_at'))


                    ->dateTime('d-M-Y')->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
