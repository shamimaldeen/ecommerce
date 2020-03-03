<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Brand;
use Image;
use File;
use Storage;

class BrandController extends Controller
{
    public function index()
    {
    	$brands = Brand::all()->sortBy("brand_name");
    	$i = 1;
    	return view('back.product_brand')->withBrands($brands)->withI($i);
    }


    /*
    !----------------------------------------
    ! Store Brand
    !----------------------------------------
    */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
                'brand_name' => 'required|max:100',
            ));
        // store in the database
        $brand = new Brand;

        $data = Brand::where('brand_name',$request->brand_name)->get();
        if (count($data) == 0) {
           $brand->brand_name = $request->brand_name;
            if ($request->hasFile('brand_image')) {
                $image = $request->file('brand_image');
                $filename = 'brand'.time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('uploads/brand/' . $filename);
                Image::make($image)->save($location);
                $brand->brand_image = $filename;
            }else{
                $brand->brand_image = "default.png";
            }
            
            $brand->created_at  = date('Y-m-d H:i:s');
            $brand->updated_at  = date('Y-m-d H:i:s');
            $brand->save();
            Session::flash('flash_message_success', 'Brand added successfully');
            return redirect('admin/product/brand');
        }else{
            Session::flash('flash_message_error', 'Brand already exist');
            return redirect('admin/product/brand');
        }
        
    }

    public function edit($id)
    {

        $brandsingle = Brand::where('id',$id)->value('brand_name');

        //dd ($brandsingle);
        //die();
        $brands     = Brand::all()->sortBy("brand_name");

        $i = 1;
        return view('back.product_brand_edit')
        ->withBrands($brands)
        ->withI($i)
        ->withBrandsingle($brandsingle)
        ->withId($id);
    }

    public function update(Request $request,$id)
    {
        // validate the data
        $this->validate($request, array(
            'brand_name' => 'required|max:100|min:3',
        ));
        //echo $catid; die;
       
        // Save the data to the database
        $brand = Brand::find($id);
        $brand->brand_name = $request->input('brand_name');
      
        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $filename = 'brand'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/brand/' . $filename);
            Image::make($image)->save($location);
            $oldfile = $brand->brand_image;
            Storage::delete('uploads/brand/'.$oldfile);
            $brand->brand_image = $filename;
        }
        $brand->save();
        Session::flash('flash_message_success', 'Brand updated successfully');
        return redirect('admin/product/brand');
    }


    public function delete($id)
    {
        $brand = Brand::find($id);
        $oldfile = $brand->brand_image;
        Storage::delete('uploads/brand/'.$oldfile);
        $brand->delete();
        Session::flash('flash_message_success', 'Brand deleted successfully');
        return redirect('admin/product/brand');
    }
}
