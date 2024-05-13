<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    //
    //Todo create a method called validateEmail, it uses Request and accepts email address only
    // create a results view
    //create a route
    public function validateEmail(Request $request){

        //add logic to validate that the input provided is an email
        // check for the other params e.g format, domain etc
        // ultimately  store/update based on your finding
        //return to a results view
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $email = $request->input('email');//Trying to access the validated email


        //trying to save the email
        $validation = new Validation;// Editing from here

        $validation->email = $email;
        $validation->save();

         return view('results')->with('email', $email);
    }
}
