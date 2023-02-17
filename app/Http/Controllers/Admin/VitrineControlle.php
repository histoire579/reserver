<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vitrine;
use App\Models\Categorie;
use Illuminate\Http\Request;

class VitrineControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vitrine=Vitrine::with('categorie')->get();
        return view('admin.page.vitrine.index')->with('vitrines',$vitrine);
    }

    public function Add()
    {
        $categorie=Categorie::all();
        return view('admin.page.vitrine.add')->with('categories',$categorie);
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
        $vitrine=new Vitrine();
        $vitrine->cat_id=$request->cat_id;
        $vitrine->save();

        if ($vitrine) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vitrine  $vitrine
     * @return \Illuminate\Http\Response
     */
    public function show(Vitrine $vitrine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitrine  $vitrine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=Categorie::all();
        $vitrine=Vitrine::with('categorie')->find($id);
        return view('admin.page.vitrine.update')->with('categories',$categorie)->with('vitrine',$vitrine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vitrine  $vitrine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vitrine=Vitrine::with('categorie')->find($id);
        $vitrine->cat_id=$request->cat_id;
        $vitrine->save();

        if ($vitrine) {
            return redirect()->route('administration.vitrine')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitrine  $vitrine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitrine=Vitrine::find($id);
        $vitrine->delete();
        if ($vitrine){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
