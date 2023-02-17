<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
        if ($request->hasFile('upload')) {
            $img=request()->file('upload');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('upload')->storeAs('public/imgs',$imageName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/imgs/'.$imageName);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getProductByCategorie($url)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $product=Product::with('categorie')->where('cat_slug',$url)->paginate(15);
        $categorie_name=Categorie::where('url',$url)->first();
        $meta_titre="Product by category: ".$categorie_name->title_en;
        $meta_image="";
        $name=$url;

        return view('search-item')->with('produits',$product)->with('name',$name)->with('meta_titre',$meta_titre)->with('meta_image',$meta_image)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie);
    }

    public function getProductByCategoriePrincipale($url)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $product=Product::with('categorie')->where('cat_parent',$url)->paginate(15);
        $categorie_name=Super::where('slug',$url)->first();
        $meta_titre="Product by principal category: ".$categorie_name->title_en;
        $meta_image="";
        $name=$url;

        return view('search-item')->with('produits',$product)->with('name',$name)->with('meta_titre',$meta_titre)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie);
    }


    public function getProductByCategorieParent($url)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $product=Product::with('categorie')->where('cat_superieur',$url)->paginate(15);
        $categorie_name=SuperCategorie::where('slug',$url)->first();
        $meta_titre="Product by parent category: ".$categorie_name->title_en;
        $meta_image="";
        $name=$url;

        return view('search-item')->with('produits',$product)->with('name',$name)->with('meta_titre',$meta_titre)->with('meta_image',$meta_image)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie);
    }

    public function getProductByTitre(Request $request)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $product=Product::with('categorie')->where('title','like','%' .$request->title. '%')->orwhere('title_en','like','%' .$request->title. '%')->paginate(15);
        $meta_titre="Search product by title";
        $meta_image="";
        $name=$request->title;

        return view('search-item')->with('produits',$product)->with('name',$name)->with('meta_titre',$meta_titre)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('meta_image',$meta_image);
    }


    public function getProductByPrix(Request $request)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $product=Product::with('categorie')->whereBetween('prix', [$request->min, $request->max])->paginate(15);
        
        $name=$request->min.'-'.$request->max;
        $meta_titre="Search product by price";
        $meta_image="";

        return view('search-item')->with('produits',$product)->with('name',$name)->with('meta_titre',$meta_titre)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('meta_image',$meta_image);
    }

    public function getProductByRemise(Request $request)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $remise=Promotion::with('produit')->where('prix',$request->remise)->paginate(15);
        $meta_titre="Search product by discount";
        $meta_image="";
        $name=$request->remise;

        return view('search-reduction-item')->with('produits',$remise)->with('name',$name)->with('meta_titre',$meta_titre)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('meta_image',$meta_image);
    }

    public function getDiscount()
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $remise=Promotion::with('produit')->orderBy('created_at','desc')->paginate(15);
        $meta_titre="Search product by discount";
        $meta_image="";
        $name="";

        return view('search-reduction-item')->with('produits',$remise)->with('name',$name)->with('meta_titre',$meta_titre)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('meta_image',$meta_image);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $couleur=Couleur::all();
        $taille=Taille::all();
        $product=Product::with('categorie')->where('url',$url)->first();
        $autres=Product::with('categorie')->where('cat_id',$product->cat_id)->get();

        $comment=Avis::where('prod_id',$product->id)->where('status','Actif')->orderBy('created_at','desc')->take(5)->get();

        $meta_titre="product detail: " .$product->title;
        $meta_image=$product->image;
        return view('detail')->with('produit',$product)->with('tailles',$taille)->with('couleurs',$couleur)->with('autres',$autres)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('meta_titre',$meta_titre)->with('comments',$comment)->with('meta_image',$meta_image);
    }

    public function editPromo(Request $request)
    {
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $couleur=Couleur::all();
        $taille=Taille::all();
        $product=Product::with('categorie')->where('id',$request->id)->first();
        $autres=Product::with('categorie')->where('cat_id',$product->cat_id)->get();

        $comment=Avis::where('prod_id',$product->id)->where('status','Actif')->orderBy('created_at','desc')->take(5)->get();

        $meta_titre="product detail: " .$product->title;
        $meta_image=$product->image;
        return view('detailPromotion')->with('produit',$product)->with('tailles',$taille)->with('couleurs',$couleur)->with('autres',$autres)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('price',$request->price)->with('meta_titre',$meta_titre)->with('comments',$comment)
                            ->with('meta_image',$meta_image);
    }

    public function editPromoByUrl($url)
    {
        $price=0;
        $super=Super::all();
        $superCategorie=SuperCategorie::all();
        $categorie=Categorie::all();
        $couleur=Couleur::all();
        $taille=Taille::all();
        $product=Product::with('categorie')->where('url',$url)->first();
        $remise=Promotion::with('produit')->where('prod_id',$product->id)->first();
        
        $autres=Product::with('categorie')->where('cat_id',$product->cat_id)->get();

        $comment=Avis::where('prod_id',$product->id)->where('status','Actif')->orderBy('created_at','desc')->take(5)->get();

        $price=$remise->produit->prix -(($remise->produit->prix * $remise->prix) / 100);

        $meta_titre="product detail: " .$product->title;
        $meta_image=$product->image;
        return view('detailPromotion')->with('produit',$product)->with('tailles',$taille)->with('couleurs',$couleur)->with('autres',$autres)
                            ->with('supers',$super)->with('superCategories',$superCategorie)->with('categories',$categorie)
                            ->with('price',$price)->with('meta_titre',$meta_titre)->with('comments',$comment)
                            ->with('meta_image',$meta_image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
