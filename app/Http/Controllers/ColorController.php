<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Brand;
use App\Color;
//use App\Color;
use Image;
use File;
use Storage;

class ColorController extends Controller
{
    public function index()
    {

    	$colors = Color::all()->sortBy("color_name");
    	$i = 1;
    	return view('back.product_color')->withColors($colors)->withI($i);
    }

    /*
    !----------------------------------------
    ! Store Color
    !----------------------------------------
    */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
                'color_name' => 'required',
            ));
        // store in the database
        $color = new Color;

        $data = Color::where('color_name',$request->color_name)->get();
        if (count($data) == 0) {
           $color->color_name = $request->color_name;

            $color->created_at  = date('Y-m-d H:i:s');
            $color->updated_at  = date('Y-m-d H:i:s');
            $color->save();
            Session::flash('flash_message_success', 'Color added successfully');
            return redirect('admin/product/color');
        }else{
            Session::flash('flash_message_error', 'Category already exist');
            return redirect('admin/product/color');
        }
        
    }

    public function edit($id)
    {

        $colorsingle = Color::where('id',$id)->value('color_name');

        //dd ($categorysingle);
        //die();
        $colors     = Color::all()->sortBy("color_name");

        $i = 1;
        return view('back.product_color_edit')
        ->withColors($colors)
        ->withI($i)
        ->withColorsingle($colorsingle)
        ->withId($id);
    }


    public function update(Request $request,$id)
    {
        // validate the data
        $this->validate($request, array(
            'color_name' => 'required|max:100|min:3',
        ));
        // Save the data to the database
        $color = Color::find($id);
        $color->color_name = $request->color_name;
      
    
        $color->save();
        Session::flash('flash_message_success', 'Color updated successfully');
        return redirect('admin/product/color');
    }


    public function delete($id)
    {
    	echo 'yes';
        $color = Color::find($id);
        $color->delete();
        Session::flash('flash_message_success', 'Color deleted successfully');
        return redirect('admin/product/color');
    }
}
