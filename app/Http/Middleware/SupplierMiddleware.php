<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class SupplierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is a supplier
        if (Auth::check() && Auth::user()->role === 'supplier') {
            // Pass the supplier ID to the request
          
         $request->attributes->set('supplier_id', Auth::user()->id);
          
          //  $supplierId = $request->attributes->get('supplier_id');
           
        }

        return $next($request);
    }
}

