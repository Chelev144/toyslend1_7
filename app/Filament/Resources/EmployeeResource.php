<?php

namespace App\Filament\Resources;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use App\Filament\Resources\IconColumn;



class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                    

                    
            ]);
    }
    public static function table(Table $table): Table
    {
        
        return $table
        ->columns([
            TextColumn::make('email')->label('כתובת מייל')
            ->icon('heroicon-m-envelope')
            ->iconColor('primary'),
             TextColumn::make('role')->label('תפקיד'),         
            TextColumn::make('name')->label('שם'),
       
             

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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}

