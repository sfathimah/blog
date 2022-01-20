<?php
  
namespace App\Http\Middleware;
use Illuminate\Http\Request; 
use Closure;
   
class Dentist
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
        if(auth()->check() && auth()->user()->user_type == "Dentist"){
            return $next($request);
        }
   
        return redirect('dentist/login')->with('error',"You don't have dentist access.");
    }
}