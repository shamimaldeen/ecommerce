<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Session;

class PageController extends Controller
{
    
    public function index()
    {
        $pages = Page::all()->sortBy("page_title");
    	$i = 1;
        return view ('back.page.page_index')->withPages($pages)->withI($i);
    }


    public function show($id)
    {
        
    }

  
    public function edit($id)
    {
        $page = Page::find($id);
    	$i = 1;
        return view ('back.page.page_edit')->withPage($page);
    }

    
    public function update(Request $request,$id)
    {
       
        $page = Page::find($id);
        $page->page_title = $request->page_title;
        $page->page_description = $request->page_description;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->save();
        Session::flash('flash_message_success', 'Page Successfully Updated');
        return redirect('admin/page');
    }
}
