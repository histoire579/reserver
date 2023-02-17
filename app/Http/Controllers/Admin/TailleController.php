<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Taille;
use Illuminate\Http\Request;

class TailleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taille=Taille::all();
        return view('admin.page.taille.index')->with('tailles',$taille);
    }

    public function Add()
    {
        return view('admin.page.taille.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taille=new Taille();
        $taille->libelle=$request->libelle;
        $taille->libelle_en=$request->libelle_en;
        
        $taille->save();

        if ($taille) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function show(Taille $taille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taille=Taille::find($id);
        return view('admin.page.taille.update')->with('taille',$taille);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $taille=Taille::find($id);
        $taille->libelle=$request->libelle;
        $taille->libelle_en=$request->libelle_en;
        
        $taille->save();

        if ($taille) {
            return redirect()->route('administration.taille')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taille=Taille::find($id);
        
        $taille->delete();
        if ($taille){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
