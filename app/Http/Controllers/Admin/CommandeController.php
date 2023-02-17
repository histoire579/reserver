<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendClient;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::with('user')->where('status','Non reglee')->orderBy('created_at','desc')->paginate(20);
        return view('admin.page.commande.indexEncours')->with('orders',$order);
    }

    public function Search(Request $request)
    {
        if ($request->code != null) {
            $order=Order::with('user')->where('status','Non reglee')->where('order_number',$request->code)->paginate(20);
            return view('admin.page.commande.indexEncours')->with('orders',$order);
        } else {
            $order=Order::with('user')->where('status','Non reglee')->orderBy('created_at','desc')->paginate(20);
            return view('admin.page.commande.indexEncours')->with('orders',$order);
        }
        
        
    }

    public function SearchDate(Request $request)
    {
        if ($request->date != null) {
            $order=Order::with('user')->where('status','Non reglee')->where('order_date',$request->date)->paginate(20);
            return view('admin.page.commande.indexEncours')->with('orders',$order);
        } else {
            $order=Order::with('user')->where('status','Non reglee')->orderBy('created_at','desc')->paginate(20);
            return view('admin.page.commande.indexEncours')->with('orders',$order);
        } 
    }

    public function SearchIntervalDate(Request $request)
    {
        if ($request->debut != null && $request->fin != null) {
            $order=Order::with('user')->where('status','Non reglee')->whereBetween('order_date', [$request->debut, $request->fin])->orderBy('created_at','desc')->paginate(20);
            return view('admin.page.commande.indexEncours')->with('orders',$order);
        } else {
            $order=Order::with('user')->where('status','Non reglee')->orderBy('created_at','desc')->paginate(20);
            return view('admin.page.commande.indexEncours')->with('orders',$order);
        } 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order=Order::with('user')->where('order_number',$order->order_number)->first();
        return view('admin.page.commande.detail')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'status' => 'Reglee'
        ]);

        return redirect()->back()->with('success','La commande à bien été réglée !');
    }

    public function SendClient(Order $order)
    {
        $order=Order::with('user')->where('order_number',$order->order_number)->first();
        //return view('admin.facture')->with('order',$order);
        Mail::to($order->user->email)->send(new SendClient($order));
        
        return back()->with('info','Votre commande à bien été enregistrée: votre panier est vide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
