<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
	/*
	!------------------------------------------
	!  Customer Archive List in Admin Panel
	!------------------------------------------
	*/
    public function index()
    {
    	$customers = Customer::all()->sortBy("customer_name");
    	return view('back.customer.customer_index')->withCustomers($customers);
    }
}
