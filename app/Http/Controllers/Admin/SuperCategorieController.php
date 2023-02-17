<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuperCategorie;
use App\Models\Super;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superCategorie=SuperCategorie::with('super')->get();
        return view('admin.page.superCategorie.index')->with('supers',$superCategorie);
    }

    public function Add()
    {
        $super=Super::all();
        return view('admin.page.superCategorie.add')->with('supers',$super);
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
        $slug=Str::slug($request->title);
        $superCategorie=new SuperCategorie();
        $superCategorie->title=$request->title;
        $superCategorie->title_en=$request->title_en;
        $superCategorie->super_id=$request->super_id;
        $superCategorie->slug=$slug;
        $superCategorie->save();

        if ($superCategorie) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuperCategorie  $superCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(SuperCategorie $superCategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperCategorie  $superCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::with('super')->find($id);
        return view('admin.page.superCategorie.update')->with('categorie',$superCategorie)->with('supers',$super);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperCategorie  $superCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->title);
        $superCategorie=SuperCategorie::with('super')->find($id);
        $superCategorie->title=$request->title;
        $superCategorie->title_en=$request->title_en;
        $superCategorie->super_id=$request->super_id;
        $superCategorie->slug=$slug;
        $superCategorie->save();

        if ($superCategorie) {
            return redirect()->route('administration.super-categorie')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperCategorie  $superCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superCategorie=SuperCategorie::find($id);
        $superCategorie->delete();
        if ($superCategorie){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
