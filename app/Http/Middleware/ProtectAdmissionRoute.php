<?php

namespace App\Http\Middleware;

use App\Models\Web\AdmissionAction;
use Closure;
use Illuminate\Http\Request;

class ProtectAdmissionRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check if admissionaction db status is false, then dont allow access to the route, redirect to '/no-admission'
        if (!AdmissionAction::where('status', '1')->exists()) {
            return redirect()->route('student.no.admission');
        }

        return $next($request);
    }
}
