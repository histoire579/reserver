<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Super;
use App\Models\SuperCategorie;
use App\Models\Categorie;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email')->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie);
    }
}
