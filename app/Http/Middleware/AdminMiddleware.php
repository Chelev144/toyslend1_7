<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // בדוק אם המשתמש הוא מנהל
       if ($request->user() && $request->user()->role === 'admin') {
             return $next($request); // אם כן, המשך לבצע את הבקשה
         }

         // אחרת, ביצוע התנהגות מותאמת אישית, לדוגמה, אם אין גישה:
         return abort(403, 'Unauthorized.'); // או להחזיר תגובת אסון 403
     }
}
