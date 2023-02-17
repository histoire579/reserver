<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Product;
use Illuminate\Http\Request;

class PromotionControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion=Promotion::with('produit')->paginate(20);
        return view('admin.page.promotion.index')->with('promotions',$promotion);
    }

    public function Add()
    {
        $produit=Product::orderBy('title','asc')->get();
        return view('admin.page.promotion.add')->with('produits',$produit);
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
        $promotion=new Promotion();
        $promotion->prix=$request->prix;
        $promotion->prod_id=$request->prod_id;
        $promotion->debut=$request->debut;
        $promotion->fin=$request->fin;
        $promotion->save();

        if ($promotion) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit=Product::orderBy('title','asc')->get();
        $promotion=Promotion::with('produit')->find($id);
        return view('admin.page.promotion.update')->with('produits',$produit)->with('promotion',$promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $promotion=Promotion::with('produit')->find($id);
        $promotion->prix=$request->prix;
        $promotion->prod_id=$request->prod_id;
        $promotion->debut=$request->debut;
        $promotion->fin=$request->fin;
        $promotion->save();

        if ($promotion) {
            return redirect()->route('administration.promotion')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion=Promotion::find($id);
        $promotion->delete();
        if ($promotion){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
