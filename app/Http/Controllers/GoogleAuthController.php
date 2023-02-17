<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user=Socialite::driver('google')->user();
            //dd($google_user->getId(),$google_user->getName());
            $user=User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                
                $new_user=User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'google_token' => $google_user->tokeny,
                ]);

                Auth::login($new_user);
                return redirect()->intended('compte');
            }else{
                $user->update([
                    'google_token' => $google_user->token
                ]);
                Auth::login($user);
                return redirect()->intended('compte');
            }
        } catch (\Throwable $th) {
            Session::flash('error','Une erreur s\'est produite'.$th->getMessage());
            //dd('Une erreur s\'est produite'.$th->getMessage());
        }
    }
}
