<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use App\Models\Product;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offre=Offre::with('produit')->paginate(20);
        return view('admin.page.offre.index')->with('offres',$offre);
    }

    public function Add()
    {
        $produit=Product::orderBy('created_at','desc')->get();
        return view('admin.page.offre.add')->with('produits',$produit);
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
        $offre=new Offre();
        $offre->prix=$request->prix;
        $offre->prod_id=$request->prod_id;
        $offre->save();

        if ($offre) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit=Product::orderBy('created_at','desc')->get();
        $offre=Offre::with('produit')->find($id);
        return view('admin.page.offre.update')->with('produits',$produit)->with('offre',$offre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offre=Offre::with('produit')->find($id);
        $offre->prix=$request->prix;
        $offre->prod_id=$request->prod_id;
        $offre->save();

        if ($offre) {
            return redirect()->route('administration.offre')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offre=Offre::find($id);
        $offre->delete();
        if ($offre){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
