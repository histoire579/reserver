<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VenteDemiGros;
use App\Models\Product;
use Illuminate\Http\Request;

class VenteDemiGrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venteDemiGros=VenteDemiGros::with('produit')->paginate(20);
        return view('admin.page.demiGros.index')->with('demiGros',$venteDemiGros);
    }

    public function Add()
    {
        $produit=Product::orderBy('title','asc')->get();
        return view('admin.page.demiGros.add')->with('produits',$produit);
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
        $venteDemiGros=new VenteDemiGros();
        $venteDemiGros->prix_unitaire=$request->prix_unitaire;
        $venteDemiGros->prod_id=$request->prod_id;
        $venteDemiGros->qte_min=$request->qte_min;
        $venteDemiGros->save();

        if ($venteDemiGros) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VenteDemiGros  $venteDemiGros
     * @return \Illuminate\Http\Response
     */
    public function show(VenteDemiGros $venteDemiGros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VenteDemiGros  $venteDemiGros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit=Product::orderBy('title','asc')->get();
        $venteDemiGros=VenteDemiGros::with('produit')->find($id);
        return view('admin.page.demiGros.update')->with('produits',$produit)->with('gros',$venteDemiGros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VenteDemiGros  $venteDemiGros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venteDemiGros=VenteDemiGros::with('produit')->find($id);
        $venteDemiGros->prix_unitaire=$request->prix_unitaire;
        $venteDemiGros->prod_id=$request->prod_id;
        $venteDemiGros->qte_min=$request->qte_min;
        $venteDemiGros->save();

        if ($venteDemiGros) {
            return redirect()->route('administration.demi-gros')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VenteDemiGros  $venteDemiGros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venteDemiGros=VenteDemiGros::find($id);
        $venteDemiGros->delete();
        if ($venteDemiGros){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
