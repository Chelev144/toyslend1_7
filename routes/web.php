<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;
use App\Http\Middleware\SupplierMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use App\Http\Controllers\EmployeeController;
#Route::resource('employee', EmployeeController::class);

use App\Filament\Resources\ProductResource\Pages\ListProducts;

Route::middleware(['auth', 'supplier'])->group(function () {
    Route::get('/products', [ListProducts::class, 'render']);
});


  
// Route::middleware([AdminMiddleware::class])->get('/users', function () {
//     $users = User::all(); // משיג את כל המשתמשים מהבסיס נתונים

//     return view('users.index', ['users' => $users]);
// });






Route::get('/', function () {
    return view('welcome');
});
