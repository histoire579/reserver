<?php

namespace App\Http\Controllers;


use App\Models\Super;
use App\Models\SuperCategorie;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        return view('compte')->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie);
    }

    public function Details()
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        return view('compte-detail')->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie);
    }

    public function Update(Request $request)
    {
        $user=User::where('id', $request->id)->first();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        if ($user) {
            return redirect()->back()->with('success','Vos informations ont bien été mise à jour!');
        } else {
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
        
    }
}
