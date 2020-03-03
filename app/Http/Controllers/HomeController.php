<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;
use App\Category;
use App\Brand;
use App\Page;
use App\Cart;
use App\Siteprofile;
use App\Slider;
Use Session;


class HomeController extends Controller
{
    private $cartitem = 0;
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /*
    !-----------------------------------
    ! Home Page 
    !-----------------------------------
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
        

    	$siteobject     = Siteprofile::first();
        $sliders        = Slider::all()->sortBy("id");
        $categories     = Category::orderBy("order_by",'asc')->get();
        $featureds      = Product::where('featured', 1)->orderBy('id','desc')->get();
        $newarrivals    = Product::where('new_arrival', 1)->orderBy('id','desc')->get();
        $brands         = Brand::take(12)->get();
       
        $hotdeals       = Product::where('hot_deals', 1)->orderBy('id','desc')->limit(3)->get();
        $offers         = Product::where('offer', 1)->orderBy('id','desc')->get();
        $top_sales      =  DB::table('products')
                          //->join('orderproducts', 'orderproducts.product_id', '=', 'products.id')
                          //->join('orders', 'orders.id', '=', 'orderproducts.order_id')
                          //->select(DB::raw('sum(orderproducts.product_id)'),'products.*')
                          //->orderBy('quantity', 'desc')
                          ->take(3)
                          ->get();

        //dd($top_sales);                    
        $sliderincrem   = 1;
        $totalcart = 0;

        return view('front.home')->with(compact('siteobject','sliders','sliderincrem','categories','featureds','newarrivals','brands','hotdeals','offers','totalcart','top_sales'));
    }

    public function contact()
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

        $userobject     = User::first();
        $siteobject     = Siteprofile::first();
        $categories     = Category::all()->sortBy("category_name");
         //dd($siteobject);

        return view('front.contact')
        ->withUserobject($userobject)
        ->withSiteobject($siteobject)
        ->withCategories($categories)
        ->withTotalcart($this->cartitem)
        ;
    }

    public function page($id,$slug="")
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


        $siteobject  = Siteprofile::first();
        $categories  = Category::all()->sortBy("category_name");

    	$page  = Page::find($id);
        if ($page == '' || $page == null) {
            return redirect('/');
        }
        return view('front.page')
        ->withSiteobject($siteobject)
        ->withCategories($categories)
        ->withPage($page)
        ->withTotalcart($this->cartitem) ;
    }


    /*
    !---------------------------------------
    !   Search Products
    !---------------------------------------
    */
    public function search(Request $request, $keywords="")
    {
        $search         = $request->search;
        $category_id    = $request->category_id;
        if ($category_id == '' || $category_id == null) {
            $products  =  DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('colors', 'products.color_id', '=', 'colors.id')
            ->select('products.id','products.fea_image1','products.product_name','products.price','products.sale_price')
            ->where('products.product_name', 'LIKE', '%'.$search.'%')
            ->orwhere('categories.category_name', 'LIKE', '%'.$search.'%')
            ->orwhere('products.model', 'LIKE', '%'.$search.'%')
            ->orderBy('products.id','desc')
            ->paginate(20);
        }else{
            $products  =  DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('colors', 'products.color_id', '=', 'colors.id')
            ->select('products.id','products.fea_image1','products.product_name','products.price','products.sale_price')
            ->where('products.product_name', 'LIKE', '%'.$search.'%')
            ->where('categories.id', 'LIKE', '%'.$category_id.'%')
            ->orderBy('products.id','desc')
            ->paginate(20);
        }
        
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

        $data = array(
            'products'      => $products,
            'totalproducts' => $products->count(),
            'totalproducts' => $products->count(),
            'siteobject'    => $siteobject,
            'categories'    => $categories,
            'totalcart'     => $this->cartitem,
            'keyword'       => $request->search,
            'min'           => '',
            'max'           => ''
        );

        //dd($products->toArray());


        return view('front.search.search',$data);
        // ->withProducts($products)
        // ->withTotalproducts($products->count())
        // ->withSiteobject($siteobject)
        // ->withCategories($categories)
        // ->withTotalcart($this->cartitem)
        // ->withKeyword($request->search);


        
    }

    /*
    !------------------------------------------------
    ! Search By Price
    !------------------------------------------------
    */
    public function search_by_price(Request $request, $keywords="")
    {

        $search         = $request->search;
        $category_id    = $request->category_id;
        if ($category_id == '' || $category_id == null) {
            $products  =  DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('colors', 'products.color_id', '=', 'colors.id')
            ->select('products.id','products.fea_image1','products.product_name','products.price','products.sale_price')
            ->where('products.price', '>=', $request->min)
            ->where('products.price', '<=', $request->max)
            ->orderBy('products.price','desc')
            ->paginate(20);
        }
        
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
        $data = array(
            'products'      => $products,
            'totalproducts' => $products->count(),
            'totalproducts' => $products->count(),
            'siteobject'    => $siteobject,
            'categories'    => $categories,
            'totalcart'     => $this->cartitem,
            'keyword'       => $request->search,
            'min'           => $request->min,
            'max'           => $request->max
        );
        return view('front.search.search',$data);
        
    }



}
