<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Category;
use App\Brand;
use App\Color;
use App\Product;
use Image;
use File;
use Storage;

class ProductController extends Controller
{
    public function add()
    {
    	$categories = Category::all()->sortBy("category_name");
    	$brands 	= Brand::all()->sortBy("brand_name");
    	$colors 	= Color::all()->sortBy("color_name");
    	return view('back.product.product_add')
    	->withCategories($categories)
    	->withBrands($brands)
    	->withColors($colors);
    }

    /*
    !----------------------------------------
    ! Store Category
    !----------------------------------------
    */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
                'product_name' => 'required|max:200|min:3',
            ));
        // store in the database
        $product = new Product;

        $product->product_name = $request->product_name;
        $product->model        = $request->model;
        $product->category_id  = $request->category_id;
        $product->brand_id     = $request->brand_id;
        $product->color_id     = $request->color_id;
        $product->price        = $request->price;
        $product->sale_price   = $request->sale_price;
        $product->description  = $request->description;
        $product->featured     = $request->featured;
        $product->new_arrival  = $request->new_arrival;
        $product->hot_deals    = $request->hot_deals;
        $product->offer        = $request->offer;
        //$product->created_at   = Carbon::Car
        if ($request->hasFile('fea_image1')) {
            $image = $request->file('fea_image1');
            $filename = 'fea1-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $product->fea_image1 = $filename;
        }

        if ($request->hasFile('fea_image2')) {
            $image = $request->file('fea_image2');
            $filename = 'fea2-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $product->fea_image2 = $filename;
        }

        if ($request->hasFile('fea_image3')) {
            $image = $request->file('fea_image3');
            $filename = 'fea3-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $product->fea_image3 = $filename;
        }

        if ($request->hasFile('fea_image4')) {
            $image = $request->file('fea_image4');
            $filename = 'fea4-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $product->fea_image4 = $filename;
        }

        if ($request->hasFile('fea_image5')) {
            $image = $request->file('fea_image5');
            $filename = 'fea5-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $product->fea_image5 = $filename;
        }


        $product->save();
        Session::put('totalproduct',Product::get()->count());
        Session::flash('flash_message_success', 'Category added successfully');
        return redirect('admin/product/add');
        
    }

    public function archive()
    {
        $products = \App\Product::with(['brand','category','color'])->get()->toArray();
        return view('back.product.product_archive')->withProducts($products);
    }

    public function edit($id,$cat,$brand,$color)
    {

        $product = Product::find($id);
        $categories = Category::all()->sortBy("category_name");
        $brands     = Brand::all()->sortBy("brand_name");
        $colors     = Color::all()->sortBy("color_name");
        return view('back.product.product_edit')
        ->withCategories($categories)
        ->withBrands($brands)
        ->withColors($colors)
        ->withProduct($product);
    }

    public function update(Request $request, $id)
    {
    
         // validate the data
        $this->validate($request, array(
                'product_name' => 'required|max:200|min:3',
            ));
        // store in the database
        $product = Product::find($id);
        //dd($request->all()); 

        $product->product_name = $request->product_name;
        $product->model        = $request->model;
        $product->category_id  = $request->category_id;
        $product->brand_id     = $request->brand_id;
        $product->color_id     = $request->color_id;
        $product->price        = $request->price;
        $product->sale_price   = $request->sale_price;
        $product->description  = $request->description;
        $product->featured     = $request->featured;
        $product->new_arrival  = $request->new_arrival;
        $product->hot_deals    = $request->hot_deals;
        $product->offer        = $request->offer;
        //$product->created_at   = Carbon::Car
        if ($request->hasFile('fea_image1')) {
            $image = $request->file('fea_image1');
            $filename = 'fea1-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $product->fea_image1;
            Storage::delete('uploads/product/feature_image/'.$oldfile);
            $product->fea_image1 = $filename;
        }

        if ($request->hasFile('fea_image2')) {
            $image = $request->file('fea_image2');
            $filename = 'fea2-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $product->fea_image2;
            Storage::delete('uploads/product/feature_image/'.$oldfile);
            $product->fea_image2 = $filename;
        }

        if ($request->hasFile('fea_image3')) {
            $image = $request->file('fea_image3');
            $filename = 'fea3-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $product->fea_image3;
            Storage::delete('uploads/product/feature_image/'.$oldfile);
            $product->fea_image3 = $filename;
        }

        if ($request->hasFile('fea_image4')) {
            $image = $request->file('fea_image4');
            $filename = 'fea4-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $product->fea_image4;
            Storage::delete('uploads/product/feature_image/'.$oldfile);
            $product->fea_image4 = $filename;
        }

        if ($request->hasFile('fea_image5')) {
            $image = $request->file('fea_image5');
            $filename = 'fea5-'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product/feature_image/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $product->fea_image5;
            Storage::delete('uploads/product/feature_image/'.$oldfile);
            $product->fea_image5 = $filename;
        }


        $product->save();
        Session::flash('flash_message_success', 'Product Updated successfully');
        return redirect('admin/product/archive');
      
    }



     public function delete($id)
    {
        $product = Product::find($id);
        $fea_image1 = $product->fea_image1;
        $fea_image2 = $product->fea_image2;
        $fea_image3 = $product->fea_image3;
        $fea_image4 = $product->fea_image4;
        $fea_image5 = $product->fea_image5;
        Storage::delete('uploads/product/feature_image/'.$fea_image1);
        Storage::delete('uploads/product/feature_image/'.$fea_image2);
        Storage::delete('uploads/product/feature_image/'.$fea_image3);
        Storage::delete('uploads/product/feature_image/'.$fea_image4);
        Storage::delete('uploads/product/feature_image/'.$fea_image5);
        $product->delete();
        Session::put('totalproduct',Product::get()->count());
        Session::flash('flash_message_success', 'Product deleted successfully');
        return redirect()->back();
    }

}
