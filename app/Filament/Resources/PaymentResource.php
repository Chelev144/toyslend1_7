<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Filters\SelectFilter; // Import SelectFilter
use Filament\Tables\Filters\SelectFilter as FiltersSelectFilter;
use Illuminate\Support\Facades\Auth;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('amount')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('payment_date')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('supplier_id')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('amount')->label('סכום'),
                TextColumn::make('payment_date')->label('תאריך תשלום'),
                TextColumn::make('supplier.name_company')->label('שם החברה')->sortable()->searchable(),
            ])
            ->filters([
                'supplier' => FiltersSelectFilter::make('supplier_id') // Use SelectFilter for supplier_id
                    ->label('ספק')
                    ->placeholder('בחר ספק')
                    ->options(static function () {
                        return Supplier::pluck('name_company', 'id')->toArray(); // Retrieve suppliers
                    }),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    protected function getTableQuery(): ?Builder
    {
        $query = parent::getTableQuery();

        // Check if the user is a supplier and modify the query accordingly
        if (Auth::check() && Auth::user()->role === 'supplier') {
            $supplierId = Auth::user()->id;
            $query->where('supplier_id', $supplierId);
        }
        

        return $query;
    }

    public static function getRelations(): array
    {
        return [];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}

