<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CheckSplitController extends Controller
{
    # Handles the request for the page, no calculations
    public function index()
    {
        #return 'Show the Check Splitter form';
        //dump(session('message'));
        return view('checksplit.index')->with([
            'message' => session('message'),
            'billAmount' => session('billAmount'),
            'tip' => session('tip'),
            'divideBy' => session('divideBy')
        ]);
    }

    # method called to calculate how to split the check
    public function splitCheck(Request $request)
    {
        #dump($request->all());
        #dd($request->all());
        #return view('checksplit.index');
        #validation: validate method is part of Controller class
        # the divideBy and tip values are set via select list and a number spinner
        # so the validation is a failsafe on the server side - it would most likely
        # already by handled by the front end.

        # This is an example of custom error messages.
        # If electing to use custom messages, pass the array ($errMsgs here)
        # as the third argument to $this->validate methoc.
        #$errMsgs = [
        #    'required' => 'You must include the :attribute value.',
        #    'integer' => 'The :attribute value must be a whole number, no fractions allowed.'
        #];

        $this->validate($request, [
            'billAmount' => 'required|numeric|min:1|max:2000',
            'divideBy' => 'required|integer|min:1|max:20',
            'tip' => 'required|integer|min:1|max:20'
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
