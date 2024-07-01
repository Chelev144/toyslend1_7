<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Illuminate\Support\Facades\Auth;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'polaris-product-icon';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(255),
            Forms\Components\TextInput::make('description')->required()->maxLength(255),
            Forms\Components\TextInput::make('cost')->required()->maxLength(255),
            Forms\Components\TextInput::make('price')->required()->maxLength(255),
            Forms\Components\TextInput::make('sku')->required()->maxLength(255),
            Forms\Components\TextInput::make('supplier_id')->required()->maxLength(255),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('price')->label('מחיר מכירה'),
            TextColumn::make('cost')->label('מחיר עלות'),
            TextColumn::make('supplier.name_company')->label('חברה')->sortable()->searchable(),
            TextColumn::make('description')->label('תאור'),
            TextColumn::make('sku')->label('מק"ט'),
            TextColumn::make('name')->label('שם'),
        ])->actions([
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
