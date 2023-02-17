<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Super;
use App\Models\SuperCategorie;
use App\Models\Categorie;
use App\Rules\ReCaptcha;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $meta_titre="Contact";

        return view('contact')->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                                ->with('meta_titre',$meta_titre);
    }


    public function Send(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $email=$request->email;
        $nom=$request->name;
        $phone=$request->phone;
        $message=$request->message;
        Mail::to('fogangndie@gmail.com')->send(new ContactMail($nom,$email,$phone,$message));
        return redirect()->back()->with('success','Votre message à bien été envoyé!');
        
    }
}
