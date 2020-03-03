<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Category;
use App\Order;
use App\Orderproduct;
use App\Product;
use App\Siteprofile;
use Session;

class OrderController extends Controller
{
    private $cartitem = 0;
    /*
    !----------------------------------
    ! Place order from Customer
    !----------------------------------
    */
    public function placeorder(Request $request)
    {
        if(!Session::has('customerlogin'))
        {
            return redirect('customer/signup');
        }

        $order = new Order;
        $order->customer_id          = Session::get('customerid');
        $order->total_quantity       = $request->total_quantity;
        $order->total_price          = $request->total_price;
        $order->shipping_cost        = $request->shipping_cost;
        $order->payment_method       = $request->payment_method;
        $order->transaction_no       = $request->transaction_no;
        $order->total_amount         = $request->total_amount;
        $order->order_billingaddress = Session::get('customer_billing_address');
        $order->order_status         = 'pending';
        $order->save();

        $lastid = Order::where('order_status', 'pending')->orderBy('id','desc')->limit(1)->get()->toArray();
        $orderproducts = Cart::with(['product'])->get()->toArray();
        foreach ($orderproducts as $orderproduct) {
            $op                 = new Orderproduct;
            $op->order_id       = $lastid[0]['id'];
            $op->product_id     = $orderproduct['product_id'];
            $op->quantity       = $orderproduct['quantity'];
            $op->price          = $orderproduct['product']['sale_price'];
            $op->total_price    = $orderproduct['quantity'] * $orderproduct['product']['sale_price'];
            $op->total_amount   = $orderproduct['quantity'] * $orderproduct['product']['sale_price'];
            $op->size           = 'XL';  //'not dynamic'
            $op->order_pro_status = 'pending';
            $op->save();
        }

        $orderdata  =  Order::where('customer_id',Session::get('customerid'))->orderBy('id','desc')->limit(1)->get()->toArray(); 
        //Remove products from cart for specific session and user
        Cart::where('session_key',Session::getId())->delete(); 
        Cart::where('customer_id',Session::get('customerid'))->delete(); 
        return redirect('order/confirmation/'.$orderdata[0]['id']);
    }


    /*
    !----------------------------------
    ! Pending Confirmation Message
    !----------------------------------
    */
    public function order_confirmation(Request $request,$id)
    {
        if(!Session::has('customerlogin'))
        {
            $this->cartitem = Cart::where(['session_key' => Session::getId()])->get()->count();
        }else
        {
            $this->cartitem = Cart::where([ 'customer_id' => Session::get('customerid')])->get()->count();
        }
        
        $siteobject = Siteprofile::first();
        $categories = Category::all()->sortBy("category_name");
        $order      = Order::with(['product'])->where(['customer_id'=>Session::get('customerid'), 'id'=>$id])->get()->toArray();

        return view('front.cart.orderconfirmation')
        ->withSiteobject($siteobject)
        ->withCategories($categories)
        ->withTotalcart($this->cartitem)
        ->withOrder($order);
        
    }

    /*
    !----------------------------------
    ! Pending Order
    !----------------------------------
    */
    public function order_pending()
    {   $orders  = Order::with(['customer'])->where(['order_status'=>'pending'])->orderBy('id','desc')->get()->toArray();
        return view('back.order.order_pending')->withOrders($orders);
    }


    /*
    !----------------------------------
    ! Delivered Order
    !----------------------------------
    */
    public function order_delivered()
    {   $orders  = Order::with(['customer'])->where(['order_status'=>'delivered'])->orderBy('id','desc')->get()->toArray();
        return view('back.order.order_delivered')->withOrders($orders);
    }


    /*
    !----------------------------------
    ! View Order Specific
    !----------------------------------
    */
    public function order_view($id)
    {  
        $orders  =  DB::table('orderproducts')
            ->join('orders', 'orderproducts.order_id', '=', 'orders.id')
            ->join('products', 'orderproducts.product_id', '=', 'products.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('colors', 'products.color_id', '=', 'colors.id')
            ->select('orders.id','orders.shipping_cost','categories.category_name','products.product_name','brand_name','color_name','model','orderproducts.id as order_pro_id','orderproducts.quantity','orderproducts.price','orderproducts.total_price')
            ->where('orders.id',$id)
            // ->select('brands', 'contacts.phone', 'orders.price')
            ->get()->toArray();

        //dd($orders);
        return view('back.order.order_view')->withOrders($orders);
    }

    /*
    !----------------------------------
    ! Change Status
    !----------------------------------
    */
    public function change_status(Request $request,$id)
    {  
        Order::where('id',$id)->update([
            'order_status'=>$request->order_status,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        Orderproduct::where('order_id',$id)->update([
            'order_pro_status'=>$request->order_status
            ,'updated_at'=>date('Y-m-d H:i:s')
        ]);
        Session::flash('flash_message_success', 'Order updated successfully');
        return redirect()->back();
    }

    /*
    !----------------------------------
    ! Delete Order 
    !----------------------------------
    */
    public function order_delete($id)
    {  
        echo 'yes';
        Order::where('id',$id)->delete();
        Session::flash('flash_message_success', 'Order deleted successfully');
        return redirect()->back();
    }


    /*
    !----------------------------------
    ! Delete Order Product
    !----------------------------------
    */
    public function orderpro_delete($id)
    {  
        Orderproduct::where('id',$id)->delete();
        Session::flash('flash_message_success', 'Order products deleted successfully');
        return redirect()->back();
    }

    /*
    !----------------------------------
    ! Order Report
    !----------------------------------
    */
    public function report()
    {  
        return view('back.order.report');
    }

    /*
    !----------------------------------
    ! Order Report
    !----------------------------------
    */
    public function action(Request $request,$report_name="",$starting="",$ending="")
    {  
       $order_report    = $request->report_name;
       $starting        = $request->starting." 00:00:00";
       $ending          = $request->ending." 23:59:59";

       if ($order_report == 'order_report') {
           
           $orders  =  DB::table('orderproducts')
            ->join('orders', 'orderproducts.order_id', '=', 'orders.id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('products', 'orderproducts.product_id', '=', 'products.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('colors', 'products.color_id', '=', 'colors.id')
            ->select('orders.id','orders.created_at','orders.total_quantity','orders.total_amount','orders.shipping_cost','categories.category_name','products.product_name','customers.first_name','customers.last_name','customers.mobile','brands.brand_name','colors.color_name','products.model','orderproducts.id as order_pro_id','orderproducts.quantity','orderproducts.price','orderproducts.total_price')
            ->where([
                'orders.order_status'=>'delivered'
            ])
            ->where('orders.created_at', '>=', $starting)
            ->where('orders.created_at', '<=', $ending)
            ->get()->toArray();
        return view('back.order.report.order_report')->withOrders($orders);

       }elseif ($order_report = 'product_sales_report') {
           
       }

    }



}
