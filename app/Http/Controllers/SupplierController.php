<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        // שליפת הספקים עם התשלומים שלהם
        
        $suppliers = Supplier::with('payments')->get();
        return view('suppliers.index', compact('suppliers'));
    }
}
