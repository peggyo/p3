<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckSplitController extends Controller
{
    //
    public function index()
    {
        #return 'Show the Check Splitter form';
        return view('checksplit.index');

    }

    public function splitCheck()
    {
        #return 'Calculate the amount for each person to pay now.';
        return view('checksplit.splitcheck');
        # Most likely redirect to form to show the answer
    }
}
