<?php

namespace App\Http\Middleware;

use Closure;
use App\User as User;
use Carbon\Carbon;

class TokenMiddleware
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
        if($request->token) {
          // Check if a user with this token exists
          $userToken = User::where('token', $request->token)->get();
          if(count($userToken) == 1) {
            // Check if the token is still valid
            return $next($request);
            //@TODO Compare the current datetime to the token_expiration
            /*if(Carbon::create($userToken[0]->token_expiration)->greaterThan(Carbon::now())) {
              dd($userToken[0]->token_expiration);
              return $next($request);
            }*/
          }
        }

        return 'token Error';die;
    }
}
