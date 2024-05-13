<?php

namespace App\Http\Controllers;

use App\Models\Validation;
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
        $validation = new Validation;
        $validation->email = $email;
        $validation->save();

        //Todo use the saved emails model instance to process it for the other considerations e.g domain
        //example

        //check for domain

        // Get the domain from the email address
        $domain = substr(strrchr($validation->email, "@"), 1);

        // Check if the domain has valid DNS records
        $domainStatus =  checkdnsrr($domain);

        //save domain status
        $validation->domain = $domainStatus;


        //continue with the other checks then finally do $validation->save();

         return view('home',compact('validation'));
    }
}
