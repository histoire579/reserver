<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategorie=BlogCategorie::all();
        return view('admin.page.blogCategorie.index')->with('categories',$blogCategorie);
    }

    public function Add()
    {
        return view('admin.page.blogCategorie.add');
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
        $categorie=new BlogCategorie();
        $categorie->title=$request->title;
        $categorie->title_en=$request->title_en;
        $categorie->slug=$slug;
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
     * @param  \App\Models\BlogCategorie  $blogCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategorie $blogCategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategorie  $blogCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=BlogCategorie::find($id);
        return view('admin.page.blogCategorie.update')->with('categorie',$categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategorie  $blogCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->title);
        $categorie=BlogCategorie::find($id);
        $categorie->title=$request->title;
        $categorie->title_en=$request->title_en;
        $categorie->slug=$slug;
        $categorie->save();

        if ($categorie) {
            return redirect()->route('administration.blog-categorie')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategorie  $blogCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie=BlogCategorie::find($id);
        $categorie->delete();
        if ($categorie){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
