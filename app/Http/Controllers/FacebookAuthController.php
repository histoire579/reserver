<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        try {
            $google_user=Socialite::driver('facebook')->user();
            //dd($google_user->token);
            $user=User::where('facebook_id', $google_user->getId())->first();

            if (!$user) {
                
                $new_user=User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'facebook_id' => $google_user->getId(),
                    'facebook_token' => $google_user->token,
                ]);

                Auth::login($new_user);
                return redirect()->intended('compte');
            }else{
                $user->update([
                    'facebook_token' => $google_user->token
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
