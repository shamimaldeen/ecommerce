<?php

namespace App\Http\Controllers;

use Illuminate\Cache\ApcStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Siteprofile;
use App\Slider;
use App\Order;
use Image;
use Storage;


class AdminController extends Controller
{

  /*
   !------------------------------------------
   ! Admin Login To Dashboard
   !------------------------------------------
    */
   public function login(Request $request)
   {
      if ($request->isMethod('post'))
      {
         $data = $request->input();
          if(Auth::attempt(['email' => $data['email'],'password' => $data['password'],'admin'=>'1']))
          {
            $siteobject = Siteprofile::first();
            $admin      = \App\User::first();
            $totalproduct = \App\Product::get()->count();

            Session::put('site_admin',$admin->name);
            Session::put('site_name',$siteobject->site_name);
            Session::put('totalproduct',$totalproduct);
            Session::flash('flash_message_success', 'Sucessfully logged in to dashboard');
          	return redirect('admin/dashboard');
          }else{
            Session::flash('flash_message_error', 'Invalid Username or Password');
            return view('back.admin_login')->with('flash_message_error','Invalid Username or Password');
          }
      }
        
   		return view('back.admin_login');
   }

  /*
  !-----------------------
  ! Admin Dashboard
  !-----------------------
   */
   public function dashboard()
   {

      //pending order for specific range
      $pending_order  = Order::with(['customer'])->where(['order_status'=>'pending'])
      ->where('created_at','<=',date('Y-m-d ').'23:23:59')
      ->where('created_at','>=',date('Y-m-d ').'00:00:00')
      ->get()->sum('total_amount');

       //delivered order for specific range
      $delivered_order  = Order::with(['customer'])->where(['order_status'=>'delivered'])
      ->where('created_at','<=',date('Y-m-d ').'23:23:59')
      ->where('created_at','>=',date('Y-m-d ').'00:00:00')
      ->get()->sum('total_amount');


       //overall pending order for specific range
      $overall_pending  = Order::with(['customer'])->where(['order_status'=>'pending'])
      ->get()->sum('total_amount');

       //overall delvered order for specific range
      $overall_delivered = Order::with(['customer'])->where(['order_status'=>'pending'])
      ->get()->sum('total_amount');


      //dd($delivered_order);

      return view('back.dashboard',['pending_order'=>$pending_order,'delivered_order'=>$delivered_order,'overall_pending'=>$overall_pending, 'overall_delivered'=>$overall_delivered]);
   }

   /*
   !------------------------------------------
   ! Admin Logout
   !------------------------------------------
  */
   public function logout()
   {  
      Auth::logout();
      Session::flash('flash_message_error','Succesfully Logged out');
      return redirect('admin');
   }

   /*
   !------------------------------------------
   ! Website Profile
   !------------------------------------------
    */
   public function site(Request $request)
   {  
      if ($request->isMethod('post')) {

        $siteobject = Siteprofile::first();
        $siteobject->site_name = $request->site_name;
        $siteobject->address = $request->address;
        $siteobject->mobile = $request->mobile;
        $siteobject->facebooklink = $request->facebooklink;
        $siteobject->youtubelink = $request->youtubelink;
        $siteobject->twitterlink = $request->twitterlink;
        $siteobject->instagramlink = $request->instagramlink;
        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $filename = 'sitelogo'.rand(1,5) . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/site/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $siteobject->sitelogo;
            Storage::delete('uploads/site/'.$oldfile);
            $siteobject->sitelogo = $filename;
        }
        Session::put('site_name',$siteobject->site_name);
        $siteobject->save();
        Session::flash('flash_message_success', 'Site profile updated successfully');
        return redirect()->route('site');
      }

      $site = Siteprofile::first();
      return view('back.siteprofile')->withSiteprofile($site);
   }


   /*
   !------------------------------------------
   ! Slider Management
   !------------------------------------------
    */
   public function slider(Request $request)
   {
      if ($request->isMethod('post'))
      {
        $slider = new Slider;
        if ($request->hasFile('slider_image')) {
              $image = $request->file('slider_image');
              $filename = 'slider'.time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('uploads/slider/' . $filename);
              Image::make($image)->save($location);
              $slider->slider_image = $filename;
              $slider->save();
              Session::flash('flash_message_success', 'Slider added successfully');
              return redirect('admin/slider');
        }
      } 
      $sliders = Slider::all();
      return view('back.slider')->withSliders($sliders)->withI($i = 1);
   }

   /*
   !------------------------------------------
   ! Delete Slider
   !------------------------------------------
    */
    public function slider_delete($id)
    {
        $slider = Slider::find($id);
        $oldfile = $slider->slider_image;
        Storage::delete('uploads/slider/'.$oldfile);
        $slider->delete();
        Session::flash('flash_message_success', 'Slider deleted successfully');
        return redirect('admin/slider');
    }


}