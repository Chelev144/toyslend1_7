<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name','name_company', 'email','phone'];


    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }
    


    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
      // הגדרת הקשר עם התשלומים
      public function payments(): HasMany
      {
          return $this->hasMany(Payment::class);
      }
}



