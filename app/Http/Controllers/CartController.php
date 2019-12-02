<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Request;
use Response;

class CartController extends Controller
{
    public function add()
    {
        $product_id = Request::get('product_id');
        $product = DB::table('shoes')->find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->outPrice,'options' => ['image' => $product->image]));
        $cart = Cart::content();
        info($cart);
        $total = Cart::total();
        $count = Cart::count();

        $data = (object) [
            'total' => $total,
            'count' => $count,
            'selectedProductName' => $product->name,
        ];
        return Response::json($data);
    }

    public function increaseCartItem($id)
    {

        $cartRow = Cart::search(function ($cartItem, $rowId) use ($id) {
            if ($cartItem->id == $id) {
                return $cartItem->name;
            }

        });
        $cartRow = $cartRow->first();
        $rowId = $cartRow->rowId;

        $item = Cart::get($rowId);

        Cart::update($rowId, $item->qty + 1);

        $result=[
            'id'=>$cartRow->id,
            'name'=>$cartRow->name,
            'price'=>$cartRow->price,
            'qty'=>$cartRow->qty,
            'subtotal'=>$cartRow->subtotal,
            'totalAll'=>Cart::subtotal(),
            'countAll'=>Cart::count(),
            'image'=>$cartRow->options->image
        ];

        return $result;
    }

    public function decreaseCartItem($id)
    {

        $cartRow = Cart::search(function ($cartItem, $rowId) use ($id) {
            if ($cartItem->id == $id) {
                return $cartItem->name;
            }

        });
        $cartRow = $cartRow->first();
        $rowId = $cartRow->rowId;

        $item = Cart::get($rowId);
        
        Cart::update($rowId, $item->qty - 1);
        $result=[
            'id'=>$cartRow->id,
            'name'=>$cartRow->name,
            'price'=>$cartRow->price,
            'qty'=>$cartRow->qty,
            'subtotal'=>$cartRow->subtotal,
            'totalAll'=>Cart::subtotal(),
            'countAll'=>Cart::count(),
            'image'=>$cartRow->options->image
        ];

        return $result;
    }

    public function checkout()
    {
        $cart = Cart::content();
        return view('checkout', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }
    public function cart()
    {
        // add new item to cart
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = DB::table('shoes')->find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->outPrice,'image'=>$product->image));
        }
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(array('id' => Request::get('product_id')));
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty + 1);
        }
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(array('id' => Request::get('product_id')));
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty - 1);
        }

        $cart = Cart::content();

        return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }
}
