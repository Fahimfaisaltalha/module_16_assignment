<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function resume()
    {
        return view('resume');
    }

    public function projects()
    {
        return view('projects');
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContact(Request $request)
    {
        // 1. Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->route('contact')
                        ->withErrors($validator)
                        ->withInput();
        }

        // 2. Log the valid user input to the log file (storage/logs/laravel.log)
        Log::info('Contact form submitted:', $validator->validated());

        // 3. Redirect to the confirmation page with the submitted data
        // We use 'with' to flash data to the session for the next request only.
        return redirect()->route('contact.confirmation')
                       ->with('success', 'Thank you for your message! We will get back to you soon.')
                       ->with('submitted_data', $validator->validated());
    }

    /**
     * Show the contact form submission confirmation page.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function contactConfirmation()
    {
        // Ensure this page can't be accessed directly without form submission data in the session
        if (!session()->has('submitted_data')) {
            return redirect()->route('contact');
        }

        return view('contact-confirmation', [
            'data' => session('submitted_data')
        ]);
    }
}
