<?php

namespace App\Http\Controllers;

use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ValidationController extends Controller
{
    //
    //Todo create a method called validateEmail, it uses Request and accepts email address only
    // create a results view
    //create a route

    /**
     * Validate an email address and store/update based on the findings.
     *
     * @param Request $request
     * @return View
     */
    public function validateEmail(Request $request)
    {
        // Add logic to validate that the input provided is an email
        // and check for the other params e.g format, domain etc
        // Ultimately store/update based on your findings
        // and return to a results view

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Extract the validated email from the request
        $email = $request->input('email');

        // Save the email to the database
        $validation = new Validation;
        $validation->email = $email;
        $validation->save();

        // Perform additional checks, e.g., domain validation
        // Get the domain from the email address
        $domain = substr(strrchr($validation->email, "@"), 1);

        // Check if the domain has valid DNS records
        $domainStatus =  checkdnsrr($domain);

        // Save domain status
        $validation->domain = $domainStatus;

        // Continue with other checks and finally save the validation instance
        // $validation->save();

        // Return to the home view with the validation instance
        return view('home', compact('validation'));
    }
}
