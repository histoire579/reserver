<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\SuperCategorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie=Categorie::with('super')->get();
        return view('admin.page.categorie.index')->with('categories',$categorie);
    }

    public function Add()
    {
        $super=SuperCategorie::all();
        return view('admin.page.categorie.add')->with('categories',$super);
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
        $categorie=new Categorie();
        $categorie->title=$request->title;
        $categorie->title_en=$request->title_en;
        $categorie->super_id=$request->super_id;
        $categorie->url=$slug;
        $categorie->save();

        if ($categorie) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $super=SuperCategorie::all();
        $categorie=Categorie::with('super')->find($id);
        return view('admin.page.categorie.update')->with('categorie',$categorie)->with('supers',$super);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->title);
        $categorie=Categorie::with('super')->find($id);
        $categorie->title=$request->title;
        $categorie->title_en=$request->title_en;
        $categorie->super_id=$request->super_id;
        $categorie->url=$slug;
        $categorie->save();

        if ($categorie) {
            return redirect()->route('administration.categorie')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie=Categorie::find($id);
        $categorie->delete();
        if ($categorie){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
