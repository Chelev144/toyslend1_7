<?php

namespace App\Filament\Resources;
use Filament\Forms\Components;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->maxLength(255),
                Forms\Components\TextInput::make('password')
                ->required()
                ->maxLength(255),
                Components\Select::make('role')
                ->label('הרשאות גישה')
                ->options([
                    'admin' => 'מנהל',
                    'user' => 'משתמש',
                    'employee'=> 'עובד',
                    'supplier'=> 'ספק'

                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')->label('אמייל'),
                TextColumn::make('name')->label('שם'),
               TextColumn::make('role')->label('הרשאות גישה')

            ])
            ->actions([
                EditAction::make(),
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
