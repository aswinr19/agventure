<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class isFarmer
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
        $farmer = User::find($id);
        if($id == NULL){
            return redirect('/auth/signin');
        }
        if($farmer->role == "farmer"){

            return $next($request);
        }
        else {
            abort(401);
        }
    }
}
