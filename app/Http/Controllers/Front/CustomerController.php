<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator;
use App\Customer;
use App\Category;
use App\Siteprofile;
use App\Cart;
use App\Wish;
use Session;
use Carbon;
//echo Session::getId();

class CustomerController extends Controller
{
	private $cartitem = 0;
	/*
	!----------------------------
	! Customer Sign Up View
	!----------------------------
	*/
    public function sign_up()
    {
    	return view('front.customer.signup');
    }

   
    /*
	!----------------------------
	! Customer Registration Data Save
	!----------------------------
	*/
    public function register(Request $request)
    {
    	$request->validate([
		    'first_name' => 'required|max:100',
		    'gender' 	 => 'required',
		    'email' 	 => 'required|unique:customers',
		    'mobile' 	 => 'required|unique:customers',
		    'billing_address' => 'required|max:255',
		    'password'   => 'min:5|max:20',
		]);

		$customer = new Customer;
		$customer->first_name = $request->first_name;
		$customer->last_name 	= $request->last_name;
		$customer->gender 		= $request->gender;
		$customer->email 		= $request->email;
		$customer->mobile 		= $request->mobile;
		$customer->billing_address = $request->billing_address;
		$customer->password 	= md5(md5($request->password));
        $customer->created_at   = date('Y-m-d H:i:s');
        $customer->updated_at   = date('Y-m-d H:i:s');
		$customer->save();
		//dd($cus);
		Session::flash('flash_message_success', 'Successfully Registered. You can login now');
       	return redirect('customer/login');

		//store in the databas
    }

    /*
	!----------------------------
	! Customer Login Up View
	!----------------------------
	*/
    public function loginview()
    {
        if(Session::has('customerlogin'))
        {
            Session::flash('flash_message_success', 'You are already loggedin. First logout to use another account');
            return redirect('cart');
        }
		return view('front.customer.login');

    }

    /*
	!----------------------------
	! Customer Login
	!----------------------------
	*/
    public function loginaction(Request $request)
    {
    	$request->validate([
		    'email'   	 => 'required',
		    'password'   => 'required',
		]);

		$count = Customer::where([ 
		       'email' 		=> $request->email,
		       'password' 	=> md5(md5($request->password))
		])->get()->count();
		
		if ($count > 0) {

			$data = Customer::orderBy('id','desc')->limit(1)->get()->toArray();

			Session::put('customerlogin',true);
			Session::put('customerid',$data[0]['id']);
			Session::put('customer_firstname',$data[0]['first_name']);
			Session::put('customer_lastname',$data[0]['last_name']);
			Session::put('customer_mobile',$data[0]['mobile']);
			Session::put('customer_billing_address',$data[0]['billing_address']);

            Cart::where('session_key',Session::getId())->update(['customer_id'=>Session::get('customerid')]);

            $wish = Wish::where('customer_id',$data[0]['id'])->get()->count();
			Session::put('totalwish',$wish);
			Session::flash('flash_message_success', 'Successfully loggedin...');
       		return redirect('cart');
		}else{
			Session::flash('flash_message_error', 'Username & Password not Matched');
       		return redirect('customer/login');
		}
    }

    /*
	!----------------------------
	! Customer Logout
	!----------------------------
    */
    public function logout(Request $request)
    {
    	$request->session()->forget([
    		'customerlogin', 'customerid','customer_firstname',
            'customer_lastname','customer_billing_address','totalwish'
    	]);
    	$request->session()->regenerate();
    	return redirect('/');
    }

    /*
	!----------------------------
	! Customer Wishlist
	!----------------------------
    */
    public function wish()
    {
    	if(!Session::has('customerlogin'))
        {
            $this->cartitem = Cart::where([ 
               'session_key' => Session::getId()]
            )->get()->count();

        }else{
            $this->cartitem = Cart::where([ 
               'customer_id' => Session::get('customerid')]
            )->get()->count();
        }

    	if(!Session::has('customerlogin'))
        {
            return redirect('customer/login');

        }
        $siteobject   = Siteprofile::first();
        $categories   = Category::all()->sortBy("category_name");
        $wishes 	  =  \App\Wish::with(['product'])->where('customer_id',Session::get('customerid'))->get()->toArray();
       
        return view('front.wish.wish')
        ->withSiteobject($siteobject)
        ->withCategories($categories)
        ->withWishes($wishes)
        ->withTotalcart($this->cartitem);
    }

    /*
	!----------------------------
	! Customer Add wish
	!----------------------------
    */
    public function addwish($product_id)
    {
    	if(!Session::has('customerlogin'))
        {
            Session::flash('flash_message_error', 'Login first to access');
       		return redirect('customer/login');
        }

        $count = Wish::where(['product_id'=>$product_id,'customer_id'=> Session::get('customerid')])->get()->count();
        if ($count> 0) {
        	Session::flash('flash_message_error', 'Already available in your wish list');
       		return redirect('customer/wishlist');
        }else{
        	$wish = new Wish;
        	$wish->product_id 	= $product_id;
        	$wish->customer_id 	= Session::get('customerid');
        	$wish->created_at   = date('Y-m-d H:i:s');
            $wish->updated_at   = date('Y-m-d H:i:s');
        	$wish->save();
        	$wish = Wish::where('customer_id',Session::get('customerid'))->get()->count();
        	Session::put('totalwish',$wish);
        	Session::flash('flash_message_error', 'Product added to wish list');
       		return redirect('customer/wishlist');
        }
    }

    /*
    !----------------------------------
    ! Delete Wish Products
    !----------------------------------
    */
    public function deletewish($id)
    {
        $cart = Wish::where(['customer_id'=>Session::get('customerid'),'id'=>$id])->delete();
        $wish = Wish::where('customer_id',Session::get('customerid'))->get()->count();
        Session::put('totalwish',$wish);
        Session::flash('flash_message_success', 'Product removed from your wish list successfully');
        return redirect('customer/wishlist');
    }
}
