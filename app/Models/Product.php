<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','cost','sku','supplier_id'];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    
}
