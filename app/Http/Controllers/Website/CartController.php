<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{

    public function cart(){
        $total= \Cart::getTotal();
        $items = \Cart::getContent();
        return view('website.cart',compact('items','total'));
    }
    public function addToCart($productId){
      $product = Product::findOrFail($productId);

      \Cart::add(array(
          'id' => $productId,
          'name' => $product->product_title,
          'price' => $product->product_newprice,
          'quantity' => 1,
          'attributes' => array(
                'image' => $product->product_image,
              ),
          'associatedModel' => $product
      ));
      return redirect()->route('cart')->with('success','Item has been added to the cart');
    }

    public function addQuantity($productId){
      \Cart::update($productId,[
        'quantity' => +1
      ]);
      return back()->with('success','Quantity has been increased');
    }

    public function decreaseQuantity($productId){
      \Cart::update($productId,[
        'quantity' => -1
      ]);
      return back()->with('success','Quantity has been decrease');
    }

    public function removeItem($productId){
      \Cart::remove($productId);
      return back()->with('success','Item has been remove from the cart');
    }

    public function clearcart(){
     \Cart::clear();
      return back()->with('success','There is no citem on your cart');
    }
}
