<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.blog.index')->with('blogs',$blog);
    }

    public function Add()
    {
        $blogCategorie=BlogCategorie::all();
        return view('admin.page.blog.add')->with('categories',$blogCategorie);
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
        $date = Date::now();
        $slug=Str::slug($request->title);
        $categorie=BlogCategorie::find($request->cat_id);
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->title_en=$request->title_en;
        $blog->short=$request->short;
        $blog->short_en=$request->short_en;
        $blog->description=$request->description;
        $blog->description_en=$request->description_en;
        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $blog->image=$imageName;
        }else {
            $blog->image=null;
        }
        $blog->auteur= Auth::user()->name;
        $blog->dates=$date;
        $blog->slug=$slug;
        $blog->cat_id=$request->cat_id;
        $blog->cat_name=$categorie->slug;
        $blog->save();

        if ($blog) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=BlogCategorie::all();
        $blog=Blog::find($id);
        return view('admin.page.blog.update')->with('blog',$blog)->with('categories',$categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->title);
        $categorie=BlogCategorie::find($request->cat_id);
        $blog=Blog::find($id);
        $blog->title=$request->title;
        $blog->title_en=$request->title_en;
        $blog->short=$request->short;
        $blog->short_en=$request->short_en;
        $blog->description=$request->description;
        $blog->description_en=$request->description_en;
        if (request()->file('image')!=null) {

            if ($blog->image != null) {
                Storage::delete('public/imgs/' .$blog->image);
            }

            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $blog->image=$imageName;
        }else {
            $blog->image=$blog->image;
        }
        $blog->auteur= Auth::user()->name;
        $blog->dates=$blog->dates;
        $blog->slug=$slug;
        $blog->cat_id=$request->cat_id;
        $blog->cat_name=$categorie->slug;
        $blog->save();

        if ($blog) {
            return redirect()->route('administration.blog')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::find($id);
        $blog->delete();
        if ($blog){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
