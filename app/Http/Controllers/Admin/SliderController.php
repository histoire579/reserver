<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::orderBy('created_at','desc')->get();
        return view('admin.page.slider.index')->with('sliders',$slider);
    }

    public function Add()
    {
        return view('admin.page.slider.add');
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
        $slider=new Slider();
        $slider->title=$request->title;
        $slider->title_en=$request->title_en;

        $slider->sous_title=$request->sous_title;
        $slider->sous_title_en=$request->sous_title_en;

        $slider->paragraphe=$request->paragraphe;
        $slider->paragraphe_en=$request->paragraphe_en;

        $slider->lien=$request->lien;

        $slider->bg=$request->bg;

        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $slider->image=$imageName;
        }

        $slider->save();

        if ($slider) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('admin.page.slider.update')->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider=Slider::find($id);
        $slider->title=$request->title;
        $slider->title_en=$request->title_en;

        $slider->sous_title=$request->sous_title;
        $slider->sous_title_en=$request->sous_title_en;

        $slider->paragraphe=$request->paragraphe;
        $slider->paragraphe_en=$request->paragraphe_en;

        $slider->lien=$request->lien;

        $slider->bg=$request->bg;

        if (request()->file('image')!=null) {

            if ($slider->image != null) {
                Storage::delete('public/imgs/' .$slider->image);
            }

            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $slider->image=$imageName;
        }else {
            $slider->image=$slider->image;
        }

        $slider->save();

        if ($slider) {
            return redirect()->route('administration.slider')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);

        if ($slider->image != null) {
            Storage::delete('public/imgs/' .$slider->image);
        }
        
        $slider->delete();
        if ($slider){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
