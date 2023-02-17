<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marque;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marque=Marque::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.marque.index')->with('marques',$marque);
    }

    public function Add()
    {
        return view('admin.page.marque.add');
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
        $marque=new Marque();
        $marque->nom=$request->nom;
        if (request()->file('logo')!=null) {
            $img=request()->file('logo');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('logo')->storeAs('public/logos',$imageName);
            $marque->logo=$imageName;
        }
        $marque->save();

        if ($marque) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marque=Marque::find($id);
        return view('admin.page.marque.update')->with('marque',$marque);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marque=Marque::find($id);
        $marque->nom=$request->nom;
        if (request()->file('logo')!=null) {

            if ($marque->logo != null) {
                Storage::delete('public/logos/' .$marque->logo);
            }
            $img=request()->file('logo');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('logo')->storeAs('public/logos',$imageName);
            $marque->logo=$imageName;
        }else{
            $marque->logo=$marque->logo;
        }
        $marque->save();

        if ($marque) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marque=Marque::find($id);
        if ($marque->logo != null) {
            Storage::delete('public/logos/' .$marque->logo);
        }
        $marque->delete();
        if ($marque){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
