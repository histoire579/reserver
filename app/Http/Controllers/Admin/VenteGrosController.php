<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VenteGros;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class VenteGrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venteGros=VenteGros::with('produit')->paginate(20);
        return view('admin.page.gros.index')->with('gros',$venteGros);
    }

    public function Add()
    {
        $produit=Product::orderBy('title','asc')->get();
        return view('admin.page.gros.add')->with('produits',$produit);
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
        $venteGros=new VenteGros();
        $venteGros->prix_unitaire=$request->prix_unitaire;
        $venteGros->prod_id=$request->prod_id;
        $venteGros->qte_min=$request->qte_min;
        $venteGros->save();

        if ($venteGros) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VenteGros  $venteGros
     * @return \Illuminate\Http\Response
     */
    public function show(VenteGros $venteGros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VenteGros  $venteGros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit=Product::orderBy('title','asc')->get();
        $venteGros=VenteGros::with('produit')->find($id);
        return view('admin.page.gros.update')->with('produits',$produit)->with('gros',$venteGros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VenteGros  $venteGros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venteGros=VenteGros::with('produit')->find($id);
        $venteGros->prix_unitaire=$request->prix_unitaire;
        $venteGros->prod_id=$request->prod_id;
        $venteGros->qte_min=$request->qte_min;
        $venteGros->save();

        if ($venteGros) {
            return redirect()->route('administration.gros')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VenteGros  $venteGros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venteGros=VenteGros::find($id);
        $venteGros->delete();
        if ($venteGros){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
