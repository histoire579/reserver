<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Support\Facades\Date;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment=comment::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.comment.index')->with('comments',$comment);
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
        $comment=new comment();
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->phone=$request->phone;
        $comment->comment=$request->comment;
        $comment->blog_id=$request->blog_id;
        $comment->status='Inactif';

        $comment->dates=$date;

        
        $comment->save();

        if ($comment) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment=comment::find($id);

        $comment->update([
            'status' => 'Inactif'
        ]);
        return redirect()->back()->with('success','Commentaire désapprouvé avec succès!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=comment::find($id);

        $comment->update([
            'status' => 'Actif'
        ]);
        return redirect()->back()->with('success','Commentaire approuvé avec succès!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=comment::find($id);
        $comment->delete();
        if ($comment){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
