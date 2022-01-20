<?php
  
namespace App\Http\Middleware;
use Illuminate\Http\Request; 
use Closure;
   
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->user_type == "Admin"){
            return $next($request);
        }
   
        return redirect('admin/login')->with('error',"You don't have admin access.");
    }
}