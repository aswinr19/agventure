<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class isAdmin
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

        $id = $request->session()->get('loggedUser');
        $admin = User::find($id);
        if($id == NULL){
            return redirect('/auth/signin');
        }
        if($admin->role == "admin"){

            return $next($request);
        }
        else {
            abort(401);
        }
        
    }
}
