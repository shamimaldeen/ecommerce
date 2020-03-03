<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactioncategory;
use App\Transaction;
use Image;
use Storage;
use Session;

class TransactionController extends Controller
{
	/*
	!---------------------------------------------
	!	Transaction Category
	!---------------------------------------------
	*/
    public function category(Request $request)
    {
        if ($request->isMethod('post'))
	    {
	       	if (Transactioncategory::where('category_name', '=', $request->category_name)->count() > 0) {
			   	Session::flash('flash_message_error', 'Transaction category already exist');
	        	return redirect('admin/transaction/category');    
			}else{
				$category = new Transactioncategory;
		        $category->category_name = $request->category_name;
		        $category->save();
		        Session::flash('flash_message_success', 'Category added successfully');
		        return redirect('admin/transaction/category'); 
			}        
      	} 
      $categories = Transactioncategory::all()->sortBy("category_name");
      return view('back.transaction.category')->withCategories($categories)->withI($i = 1);
    }

    /*
	!---------------------------------------------
	!	Transaction Category Delete
	!---------------------------------------------
	*/
    public function category_delete($id)
    {
        $transaction = Transactioncategory::find($id);
        $transaction->delete();
        Session::flash('flash_message_success', 'Trransaction category deleted successfully');
        return redirect('admin/transaction/category');
    }

    /*
    !---------------------------------------------
    !   Transaction Archive
    !---------------------------------------------
    */
    public function transaction_archive()
    {
        $transactions = \App\Transaction::with(['transactioncategory'])->get()->toArray();
        

        //dd($transactions);
        $i = 1;
        return view('back.transaction.account_archive')
        ->withTransactions($transactions)
        ->withI($i);
    }

    /*
	!---------------------------------------------
	!	Transaction Add
	!---------------------------------------------
	*/
    public function transaction_add()
    {
        $transcats  = Transactioncategory::all()->sortBy("category_name");
        $i = 1;
        return view('back.transaction.transaction_add')
        ->withCategories($transcats)->withI($i);
    }


    /*
    !---------------------------------------------
    !   Transaction Save
    !---------------------------------------------
    */
    public function transaction_save(Request $request)
    {
        $category = new Transaction;
        $category->transaction_date = $request->transaction_date;
        $category->category_id      = $request->category_id;
        $category->cash_pay         = $request->cash_pay;
        $category->cash_receive     = $request->cash_receive;
        $category->description      = $request->description;
        $category->save();
        Session::flash('flash_message_success', 'Transaction saved successfully');
        return redirect('admin/transaction/archive');
    }

    /*
    !---------------------------------------------
    !   Transaction Edit
    !---------------------------------------------
    */
    public function transaction_edit($id)
    {
        $transcats      = Transactioncategory::all()->sortBy("category_name");   
        $transaction    = Transaction::find($id);
        return view('back.transaction.transaction_edit')
        ->withCategories($transcats)
        ->withTransaction($transaction);
    }

    /*
    !---------------------------------------------
    !   Transaction Update
    !---------------------------------------------
    */
    public function transaction_update(Request $request, $id)
    {
        $category = Transaction::find($id);
        $category->transaction_date = $request->transaction_date;
        $category->category_id      = $request->category_id;
        $category->cash_pay         = $request->cash_pay;
        $category->cash_receive     = $request->cash_receive;
        $category->description      = $request->description;
        $category->save();
        Session::flash('flash_message_success', 'Transaction updated successfully');
        return redirect('admin/transaction/archive');
    }

     public function transaction_delete($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        Session::flash('flash_message_success', 'Transaction deleted successfully');
        return redirect('admin/transaction/archive');
    }

}
