<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = ['amount','payment_date','supplier_id'];

   

    public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

}


