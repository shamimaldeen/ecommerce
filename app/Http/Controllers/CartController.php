<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Category;
use App\Cart;
use App\Siteprofile;
use Session;


class CartController extends Controller
{
    private $cartitem = 0;

    /*
    !-------------------------
    ! Public Cart Page
    !-------------------------
    */
    public function index()
    {
        $carts = [];
        if(!Session::has('customerlogin'))
        {
            $this->cartitem = Cart::where([ 
               'session_key' => Session::getId()]
            )->get()->count();

            $carts = \App\Cart::with(['customer','product'])->where(['carts.session_key'=>Session::getId()])->get()->toArray();
        }else
        {
            $this->cartitem = Cart::where([ 
               'customer_id' => Session::get('customerid')]
            )->get()->count();

            $carts = \App\Cart::with(['customer','product'])->where(['carts.customer_id'=>Session::get('customerid')])->get()->toArray();
        }

        
        $siteobject     = Siteprofile::first();
        $categories     = Category::all()->sortBy("category_name");
                
        return view('front.cart.cart')
        ->withCarts($carts)
        ->withTotalcart($this->cartitem)
        ->withSiteobject($siteobject)
        ->withCategories($categories);
    }
    
    /*
    !-------------------------
    ! Add Product to Cart
    !-------------------------
    */
    public function add(Request $request,$id)
    {
        $customer_id = Session::get('customerid');
        $cart = Cart::where([ 
               'product_id' => $id,
               'customer_id' => $customer_id])->get()->toArray();
        
        if (count($cart) > 0) {
            Session::flash('flash_message_error', 'Product Already Added');
            return redirect('cart');
        }else{
            $object = new Cart;
            $quantity = $request->quantity;
            if ($request->quantity == '' || $request->quantity == null) {
                $quantity = 1;
            }
            $object->quantity    = $quantity;
            $object->product_id  = $id;

            $product = Product::find($id);

            $object->customer_id    = Session::get('customerid');
            $object->priceamount    = $product->sale_price;
            $object->session_key    = Session::getId();
            $object->created_at     = date('Y-m-d H:i:s');
            $object->updated_at     = date('Y-m-d H:i:s');
            $object->save();
            Session::flash('flash_message_success', 'Product added to cart');
            return redirect('cart');
        }
    } 

    /*
    !-------------------------
    ! Edit Cart Product
    !-------------------------
    */
    public function edit(Request $request,$id)
    {
        if(!Session::has('customerlogin'))
        {
            $cart = Cart::where(['id'=>$id, 'session_key'=>Session::getId()])->update(array('quantity' => $request->quantity));
        }else{
            $cart = Cart::where(['customer_id'=>Session::get('customerid'),'id'=>$id])->update(array('quantity' => $request->quantity));
        }

        Session::flash('flash_message_success', 'Product quantity updated');
        return redirect('cart');
    } 

    /*
    !----------------------------------
    ! Delete Cart Products
    !----------------------------------
    */
    public function delete($id)
    {
        if(!Session::has('customerlogin'))
        {
            $cart = Cart::where(['session_key'=>Session::getId(),'id'=>$id])->delete();
        }else{
            $cart = Cart::where(['customer_id'=>Session::get('customerid'),'id'=>$id])->delete();
        }
        
        Session::flash('flash_message_success', 'Product deleted from cart');
        return redirect('cart');
    }

}
