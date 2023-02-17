<?php

namespace App\Repositories;
use App\Models\Product;
//use Darryldecode\Cart\Cart;

class CartRepository
{
    public function add(Product $product,$prix, $taille, $couleur, $qte)
    {
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 19.25%',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '19.25%',
            'order' => 2
            
        ));

        \Cart::session(auth()->user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $prix,
            'quantity' => $qte,
            'attributes' => array(
                'taille' => $taille,
                'couleur' => $couleur
            ),
            'associatedModel' => $product

        ));

        \Cart::session(auth()->user()->id)->condition($condition);

        return $this->count();
    }

    public function incrementer($id)
    {
         \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => +1
        ]);
    }

    public function updatePlus($id,$prix)
    {
         \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => +1,
            'price' => $prix,
        ]);
    }

    public function decrementer($id)
    {
        $item=\Cart::session(auth()->user()->id)->get($id);
        if ($item->quantity == 1) {
            $this->remove($id);
             
             return;
        } 
        
         \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => -1,

        ]);
    }

    public function update($id,$prix)
    {
        $item=\Cart::session(auth()->user()->id)->get($id);
        if ($item->quantity == 1) {
            $this->remove($id);
             
             return;
        } 
        
         \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => -1,
            'price' => $prix,
        ]);
    }

    public function remove($id)
    {
        \Cart::session(auth()->user()->id)->remove($id);
    }

    public function content()
    {
        return \Cart::session(auth()->user()->id)->getContent();
    }

    public function count()
    {
        return $cartTotalQuantity = \Cart::session(auth()->user()->id)->getTotalQuantity();
    }

    public function clear()
    {
        \Cart::session(auth()->user()->id)->clear();
    }

    public function total()
    {
       return $total= \Cart::session(auth()->user()->id)->getTotal();
    }

    public function quantite()
    {
       return $quantite= \Cart::session(auth()->user()->id)->getTotalQuantity();
    }
}