<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Super;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $super=Super::all();
        return view('admin.page.super.index')->with('supers',$super);
    }

    public function Add()
    {
        return view('admin.page.super.add');
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
        $super=new Super();
        $super->title=$request->title;
        $super->title_en=$request->title_en;
        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $super->image=$imageName;
        }else {
            $super->image=null;
        }
        $super->slug=$slug;
        $super->save();

        if ($super) {
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
    public function show(Super $super)
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
        $super=Super::find($id);
        return view('admin.page.super.update')->with('super',$super);
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
        $super=Super::find($id);
        $super->title=$request->title;
        $super->title_en=$request->title_en;
        if (request()->file('image')!=null) {
            if ($super->image != null) {
                Storage::delete('public/imgs/' .$super->image);
            }
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $super->image=$imageName;
        }else {
            $super->image=$super->image;
        }
        $super->slug=$slug;
        $super->save();

        if ($super) {
            return redirect()->route('administration.super')->with('success','Modifier avec succès!');
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
        $super=Super::find($id);
        if ($super->image != null) {
            Storage::delete('public/imgs/' .$super->image);
        }
        $super->delete();
        if ($super){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
