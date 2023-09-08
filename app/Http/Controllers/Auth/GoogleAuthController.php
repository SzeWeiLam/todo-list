<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;

class GoogleAuthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        $google_user = Socialite::driver('google')->stateless()->user();

        if($google_user){
            $user = User::where('google_id', $google_user->id)->first();
            if ($user) {
                $user->update([
                    'google_id' => $google_user->id,
                    'token' => $google_user->token,
                    'expired_at' => Carbon::now()->addHour()
                ]);
            } else {
                $user = User::create([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id,
                    'token' => $google_user->token,
                    'expired_at' => Carbon::now()->addHour()
                ]);
            }
            Auth::login($user);

            $res = [
                'user' => $user->email,
                'msg' => 'Logged in successfully'
            ];

            return response()->json($res, 200);
        }
     
        $res = [
            'msg' => 'User not found'
        ];

        return response()->json($res, 404);
    
    }
    
}
