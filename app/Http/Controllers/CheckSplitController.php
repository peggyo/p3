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

    public function splitCheck(Request $request)
    {
        #return 'Calculate the amount for each person to pay now.';
        #return view('checksplit.splitcheck');
        # Most likely redirect to form to show the answer

        /***************************************************/
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
        dump($request->all());
        return view('checksplit.index');
    }
}
