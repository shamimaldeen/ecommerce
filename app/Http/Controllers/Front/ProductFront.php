<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Siteprofile;
use App\Product;
use App\Category;
use App\Brand;
use App\Cart;
use Session;

class ProductFront extends Controller
{
    private $cartitem = 0;

    /*
    !---------------------------------------
    !   View All PRoducts
    !---------------------------------------
    */
    public function index()
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

        $siteobject   = Siteprofile::first();
        $categories   = Category::all()->sortBy("category_name");
        $products     = \App\Product::with(['brand','category','color'])->orderBy('id','desc')->paginate(24);
        return view('front.product.product_index')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withCategories($categories)->withTotalcart($this->cartitem)
        ;
    }

    /*
    !---------------------------------------
    !   View Single Product Data
    !---------------------------------------
    */
    public function view($id,$slug=''){
    
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

        $siteobject   = Siteprofile::first();
        $categories   = Category::all()->sortBy("category_name");
        $product      = Product::with(['brand','category','color'])->where('id',$id)->get()->toArray();
        

        $productsidebars      = Product::with(['brand','category','color'])
        ->where('category_id',$product[0]['category_id'])
        ->whereNotIn('id', [0,$id])
        ->limit(4)
        ->orderBy(DB::raw('RAND()'))
        ->get()->toArray();

      
        return view('front.product.product_single')
        ->withProduct($product)
        ->withSiteobject($siteobject)
        ->withCategories($categories)
        ->withProductsidebars($productsidebars)
        ->withTotalcart($this->cartitem);
    }


    /*
    !---------------------------------------
    !   View Single Product Data By Category
    !---------------------------------------
    */
    public function category($category_id,$slug='')
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

        $categories   = Category::all()->sortBy("category_name");
        //dd($categories);
        $siteobject     = Siteprofile::first();
        $singlecategory = Category::find($category_id);

        if ($singlecategory  == '' || $singlecategory  == null) {
            return redirect('product');
        }
        $products  = \App\Product::with(['brand','category','color'])->orderBy('id','desc')->where('category_id',$category_id)->paginate(20);
        //dd($product);
        return view('front.product.product_category')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withCategories($categories)
        ->withSinglecategory($singlecategory)
        ->withTotalcart($this->cartitem)
        ;
    }

     /*
    !---------------------------------------
    !   View Single Product Data By Brand
    !---------------------------------------
    */
    public function brand($brand_id,$slug='')
    { // die;
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

        $categories   = Category::all()->sortBy("category_name");
        $brands   = Brand::all()->sortBy("brand_name");

        //dd($categories);
        $siteobject     = Siteprofile::first();
        $singlebrand = Brand::find($brand_id);

        $products  = \App\Product::with(['brand','category','color'])->orderBy('id','desc')->where('brand_id',$brand_id)->paginate(20);
        //=dd($product);
        return view('front.product.product_brand')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withBrands($brands)
        ->withCategories($categories)
        ->withSinglebrand($singlebrand)
        ->withTotalcart($this->cartitem);
    }

    /*
    !---------------------------------------
    !   Featured Product
    !---------------------------------------
    */
    public function featured(Request $request)
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

        $siteobject   = Siteprofile::first();
        $categories   = Category::all()->sortBy("category_name");
        $products     = \App\Product::with(['brand','category','color'])->where('products.featured','1')->orderBy('id','desc')->paginate(24);

        return view('front.product.product_index')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withCategories($categories)->withTotalcart($this->cartitem)
        ;
    }

    /*
    !---------------------------------------
    !  New Arrival Proudcts
    !---------------------------------------
    */
    public function new_arrival()
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

        $siteobject     = Siteprofile::first();
        $categories     = Category::all()->sortBy("category_name");
        $products       = \App\Product::with(['brand','category','color'])->where('products.new_arrival','1')->orderBy('id','desc')->paginate(20);

        return view('front.product.product_index')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withCategories($categories)->withTotalcart($this->cartitem)
        ;
    }


    /*
    !---------------------------------------
    !  HOt Deals Proudcts
    !---------------------------------------
    */
    public function hot_deals()
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

        $siteobject     = Siteprofile::first();
        $categories     = Category::all()->sortBy("category_name");
        $products       = \App\Product::with(['brand','category','color'])->where('products.hot_deals','1')->orderBy('id','desc')->paginate(20);

        return view('front.product.product_index')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withCategories($categories)->withTotalcart($this->cartitem)
        ;
    }


    /*
    !---------------------------------------
    !  Offer Proudcts
    !---------------------------------------
    */
    public function offer()
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

        $siteobject     = Siteprofile::first();
        $categories     = Category::all()->sortBy("category_name");
        $products       = \App\Product::with(['brand','category','color'])->where('products.offer','1')->orderBy('id','desc')->paginate(20);

        return view('front.product.product_index')
        ->withProducts($products)
        ->withSiteobject($siteobject)
        ->withCategories($categories)->withTotalcart($this->cartitem)
        ;
    }



    /*
    !---------------------------------------
    !   Product Count By Category(Helper)
    !---------------------------------------
    */
    public static function  procountbycategory($category_id)
    {
        return Product::where('category_id',$category_id)->get()->count();
    }

     /*
    !---------------------------------------
    !   Product Count By Brand(Helper)
    !---------------------------------------
    */
    public static function  procountbybrand($brand_id)
    {
        return Product::where('brand_id',$brand_id)->get()->count();
    }

    


    /*
    !---------------------------------------
    !   Product Count By Featured(Helper)
    !---------------------------------------
    */
    public static function  procountbyfeatured()
    {
        return Product::where('featured',1)->get()->count();
    }

    /*
    !---------------------------------------
    !   Product Count By New Arrival(Helper)
    !---------------------------------------
    */
    public static function  procountbynewarrival()
    {
        return Product::where('new_arrival',1)->get()->count();
    }


    /*
    !---------------------------------------
    !   Product Count By Hot Deals(Helper)
    !---------------------------------------
    */
    public static function  procountbyhotdeals()
    {
        return Product::where('hot_deals',1)->get()->count();
    }

    /*
    !---------------------------------------
    !   Product Count By Offer(Helper)
    !---------------------------------------
    */
    public static function  procountbyoffer()
    {
        return Product::where('offer',1)->get()->count();
    }


}
