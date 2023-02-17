<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Super;
use App\Models\SuperCategorie;
use App\Models\Taille;
use App\Models\Couleur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.produit.index')->with('produits',$product);
    }

    public function Add()
    {
        $couleur=Couleur::all();
        $taille=Taille::all();
        $categorie=Categorie::orderBy('title','asc')->get();
        return view('admin.page.produit.add')->with('categories',$categorie)->with('tailles',$taille)
                                                ->with('couleurs',$couleur);
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
        $size='';
        $color='';
        if ($request->taille !=null) {
            foreach ($request->taille as  $value) {
                $size .= $value .',';
            } 
        }
        

        
        if ($request->couleur !=null) {
            foreach ($request->couleur as  $value) {
                $color .= $value .',';
            }
        }

        $categorie=Categorie::find($request->cat_id);
        $categorie_parent=SuperCategorie::where('id',$categorie->super_id)->first();
        $super=Super::where('id',$categorie_parent->super_id)->first();
        $date = Date::now();
        $shop=new Product();
        $shop->title=$request->title;
        $shop->title_en=$request->title_en;
        $shop->caracteristique=$request->caracteristique;
        $shop->caracteristique_en=$request->caracteristique_en;
        $shop->description=$request->description;
        $shop->description_en=$request->description_en;
        $shop->prix=$request->prix;
        $shop->ancien_prix=$request->ancien_prix;
        $shop->dates=$date;
        $shop->cat_id=$request->cat_id;
        $shop->cat_slug=$categorie->url;
        $shop->url=$slug;
        $shop->taille=$size;
        $shop->couleur=$color;
        $shop->prix_gros=$request->prix_gros;
        $shop->qte_min=$request->qte_min;
        $shop->qte_min_gros=$request->qte_min_gros;
        
        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $shop->image=$imageName;
        }

        if (request()->file('image2')!=null) {
            $img2=request()->file('image2');
            $imageName2=$img2->getClientOriginalName();
            $imageName2=time().'_'.$imageName2;
            $path=request()->file('image2')->storeAs('public/imgs',$imageName2);
            $shop->image2=$imageName2;
        }else {
            $shop->image2=null;
        }
        if (request()->file('image3')!=null) {
            $img3=request()->file('image3');
            $imageName3=$img3->getClientOriginalName();
            $imageName3=time().'_'.$imageName3;
            $path=request()->file('image3')->storeAs('public/imgs',$imageName3);
            $shop->image3=$imageName3;
        }else {
            $shop->image3=null;
        }

        if (request()->file('video')!=null) {
            $img=request()->file('video');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('video')->storeAs('public/media',$imageName);
            $shop->video=$imageName;
        }else{
            $shop->video=null;
        }
        $shop->cat_superieur=$categorie_parent->slug;
        $shop->cat_parent=$super->slug;
        
        $shop->save();

        if ($shop) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::with('categorie')->find($id);
        $categorie=Categorie::orderBy('title','asc')->get();
        $couleur=Couleur::all();
        $taille=Taille::all();
        return view('admin.page.produit.update')->with('produit',$product)->with('categories',$categorie)
                                                ->with('tailles',$taille)->with('couleurs',$couleur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->title);
        $size='';
        $color='';
        
        if ($request->taille !=null) {
            foreach ($request->taille as  $value) {
                $size .= $value .',';
            } 
        }
        

        
        if ($request->couleur !=null) {
            foreach ($request->couleur as  $value) {
                $color .= $value .',';
            }
        }
        $categorie=Categorie::find($request->cat_id);

        $categorie_parent=SuperCategorie::where('id',$categorie->super_id)->first();
        $super=Super::where('id',$categorie_parent->super_id)->first();

        $shop=Product::with('categorie')->find($id);
        $shop->title=$request->title;
        $shop->title_en=$request->title_en;
        $shop->caracteristique=$request->caracteristique;
        $shop->caracteristique_en=$request->caracteristique_en;
        $shop->description=$request->description;
        $shop->description_en=$request->description_en;
        $shop->prix=$request->prix;
        $shop->ancien_prix=$request->ancien_prix;
        $shop->cat_id=$request->cat_id;
        $shop->cat_slug=$categorie->url;
        $shop->url=$slug;
        $shop->taille=$size;
        $shop->couleur=$color;
        
        $shop->prix_gros=$request->prix_gros;
        $shop->qte_min=$request->qte_min;
        $shop->qte_min_gros=$request->qte_min_gros;

        if (request()->file('image')!=null) {
            if ($shop->image != null) {
                Storage::delete('public/imgs/' .$shop->image);
            }
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $shop->image=$imageName;
        }else {
            $shop->image=$shop->image;
        }

        if (request()->file('image2')!=null) {
            if ($shop->image2 != null) {
                Storage::delete('public/imgs/' .$shop->image2);
            }
            $img2=request()->file('image2');
            $imageName2=$img2->getClientOriginalName();
            $imageName2=time().'_'.$imageName2;
            $path=request()->file('image2')->storeAs('public/imgs',$imageName2);
            $shop->image2=$imageName2;
        }else {
            $shop->image2=$shop->image2;
        }
        if (request()->file('image3')!=null) {
            if ($shop->image3 != null) {
                Storage::delete('public/imgs/' .$shop->image3);
            }
            $img3=request()->file('image3');
            $imageName3=$img3->getClientOriginalName();
            $imageName3=time().'_'.$imageName3;
            $path=request()->file('image3')->storeAs('public/imgs',$imageName3);
            $shop->image3=$imageName3;
        }else {
            $shop->image3=$shop->image3;
        }

        if (request()->file('video')!=null) {
            if ($shop->video != null) {
                Storage::delete('public/imgs/' .$shop->video);
            }
            $img=request()->file('video');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('video')->storeAs('public/media',$imageName);
            $shop->video=$imageName;
        }else{
            $shop->video=$shop->video;
        }
        $shop->cat_superieur=$categorie_parent->slug;
        $shop->cat_parent=$super->slug;
        
        $shop->save();

        if ($shop) {
            return redirect()->route('administration.produit')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop=Product::find($id);
        if ($shop->image != null) {
            Storage::delete('public/imgs/' .$shop->image);
        }
        if ($shop->image2 != null) {
            Storage::delete('public/imgs/' .$shop->image2);
        }
        if ($shop->image3 != null) {
            Storage::delete('public/imgs/' .$shop->image3);
        }

        if ($shop->video != null) {
            Storage::delete('public/imgs/' .$shop->video);
        }
        $shop->delete();
        if ($shop){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
