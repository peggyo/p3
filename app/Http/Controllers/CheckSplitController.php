<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckSplitController extends Controller
{
    //
    public function index()
    {
        #return 'Show the Check Splitter form';
        //dump(session('message'));
        return view('checksplit.index')->with([
            'message' => session('message')
        ]);

    }

    public function splitCheck(Request $request)
    {

        #dump($request->all());
        #return view('checksplit.index');

        #validation: validate method is part of Controller class
        $this->validate($request, [
            'billAmount' => 'required|numeric|min:1|max:2000',
            'divideBy' => 'required|integer|min:1'
        ]);

        # If there are validation errors we would already have returned so no
        # need to check to see if $errors is populated


        $percentage = ($request->tip / 100);
        $totalBill = $request->billAmount + ($request->billAmount * $percentage);
        $singleShare = $totalBill / $request->divideBy;

        $round = $request->has('round');
        if ($round) {
            $singleShare = round($singleShare);
        }

        #dd($request->tip);


        # Note: I am currently only using the message that is returned. I am returning the other values
        # because I am thinking I will need them to maintain the old values even if validation is passed.
        # I am struggling with this part of the app, so I may be wrong here....  Still working.
        return redirect('/')->with([
            'message' => 'Each pay $'.$singleShare.' out of a total $'.$totalBill.'.',
            'billAmount' => $request->billAmount,
            'tip' => $request->tip,
            'divideBy' => $request->divideBy
        ]);

    }

        #return 'Calculate the amount for each person to pay now.'
        #return view('checksplit.splitcheck');
        # Most likely redirect to form to show the answer

        /***************************************************
        public function splitCheck(Request $request)
        {
        */
        /* A BUNCH OF TESTING
        # See all the properties and methods available in the $request object
            dump($request);

            # See just the form data from the $request object
            dump($request->all());

            # See just the form data for a specific input, in this case a text input
            dump($request->input('searchTerm'));

            # See what the form data looks like for a checkbox
            dump($request->input('caseSensitive'));

            # Boolean to see if the request contains data for a particular field
            dump($request->has('searchTerm')); # Should be true
            dump($request->has('publishedYear')); # There's no publishedYear input, so this should be false

            # You can get more information about a request than just the data of the form, for example...
            dump($request->fullUrl());
            dump($request->method());
            dump($request->isMethod('post'));

            # ======== End exploration of $request ==========
            */
            # Return the view with some placeholder data we'll flesh out in a later step
            /*
            return view('checksplit.index')->with([
                'amount' => '',
                'round' => true,
                'BLAH BLAH' => []
            ]);
            */

        /* END: A BUNCH OF TESTING */
        /***************************************************/
    }
