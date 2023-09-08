<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Carbon\Carbon;

class GoogleAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = request()->bearerToken();
        // $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);  // Specify the CLIENT_ID of the app that accesses the backend

        $user = User::where('token', $token)->first();
        if($user){

            if(Carbon::now() >= $user->expired_at){
                $res = [
                    'msg' => 'Token expired, login to get a new token.'
                ];

                return response()->json($res, 401);
            }

            return $next($request);

        }
        $res = [
            'msg' => 'User authentication failed. Please login or provide a new token to proceed.'
        ];

        return response()->json($res, 404);
        
    }
}
