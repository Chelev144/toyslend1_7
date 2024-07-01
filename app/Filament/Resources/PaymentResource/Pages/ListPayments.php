<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getTableQuery(): ?Builder
    {
        $query = parent::getTableQuery();
    
        if (Auth::check() && Auth::user()->role === 'supplier') {
            $supplierId = Auth::user()->id;
    
            if ($query instanceof Builder) {
                // Log or dd($supplierId) to ensure it's correct
                Log::info('Supplier ID: ', [ Auth::user()]);
    
                $query->where('supplier_id', $supplierId-1);
            }
        }
    
        return $query;
    }
    
}
