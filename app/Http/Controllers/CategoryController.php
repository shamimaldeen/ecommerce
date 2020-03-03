<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Category;
use Image;
use File;
use Storage;

class CategoryController extends Controller
{

    /*
    !-------------------------------
    ! View Category List
    !-------------------------------
    */
    public function index()
    {
    	$categories = Category::all()->sortBy("category_name");
    	$i = 1;
    	return view('back.product_category')->withCategories($categories)->withI($i);
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
                'category_name' => 'required',
            ));
        // store in the database
        $category = new Category;

        $data = Category::where('category_name',$request->category_name)->get();
        if (count($data) == 0) {
           $category->category_name = $request->category_name;
           $category->order_by = $request->order_by;
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $filename = 'cat'.time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('uploads/category/' . $filename);
                Image::make($image)->resize(400, 200)->save($location);
                $category->category_image = $filename;
            }else{
                $category->category_image = "default.png";
            }

            $category->created_at  = date('Y-m-d H:i:s');
            $category->updated_at  = date('Y-m-d H:i:s');
            $category->save();
            Session::flash('flash_message_success', 'Category added successfully');
            return redirect('admin/product/category');
        }else{
            Session::flash('flash_message_error', 'Category already exist');
            return redirect('admin/product/category');
        }
        
    }

    /*
    !-------------------------------
    ! Edit Product Category
    ! @param id
    !-------------------------------
    */
    public function edit($id)
    {

        $categorysingle = Category::where('id',$id)->get();

        
        //dd ($categorysingle);
        //die();
        $categories     = Category::all()->sortBy("category_name");

        $i = 1;
        return view('back.product_category_edit')
        ->withCategories($categories)
        ->withI($i)
        ->withCategorysingle($categorysingle)
        ->withId($id);
    }


    /*
    !-------------------------------
    ! Update Product Category
    ! @param id
    !-------------------------------
    */
    public function update(Request $request,$id)
    {
        // validate the data
        $this->validate($request, array(
            'category_name' => 'required|max:100|min:3',
        ));
        //echo $catid; die;
       
        // Save the data to the database
        $category = Category::find($id);
        $category->category_name    = $request->input('category_name');
        $category->order_by         = $request->input('order_by');
      
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $filename = 'cat'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/category/' . $filename);
            Image::make($image)->resize(400, 200)->save($location);
            $oldfile = $category->category_image;
            Storage::delete('uploads/category/'.$oldfile);
            $category->category_image = $filename;
        }
        $category->save();
        Session::flash('flash_message_success', 'Category updated successfully');
        return redirect('admin/product/category');
    }

    /*
    !--------------------------------------
    ! Delete Product Category
    !--------------------------------------
    */
    public function delete($id)
    {
        $category = Category::find($id);
        $oldfile = $category->category_image;
        Storage::delete('uploads/category/'.$oldfile);
        $category->delete();
        Session::flash('flash_message_success', 'Category deleted successfully');
        return redirect('admin/product/category');
    }

}
