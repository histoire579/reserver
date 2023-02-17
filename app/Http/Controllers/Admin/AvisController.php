<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avis;
use Illuminate\Support\Facades\Date;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avis=Avis::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.avis.index')->with('avis',$avis);
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
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $date = Date::now();
        $avis=new Avis();
        $avis->name=$request->name;
        $avis->email=$request->email;
        $avis->phone=$request->phone;
        $avis->comment=$request->comment;
        $avis->prod_id=$request->prod_id;
        $avis->status='Inactif';

        $avis->dates=$date;

        
        $avis->save();

        if ($avis) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avis=Avis::find($id);

        $avis->update([
            'status' => 'Inactif'
        ]);
        return redirect()->back()->with('success','avis désapprouvé avec succès!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avis=Avis::find($id);

        $avis->update([
            'status' => 'Actif'
        ]);
        return redirect()->back()->with('success','avis approuvé avec succès!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avis $avis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $avis=Avis::find($id);
        $avis->delete();
        if ($avis){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
