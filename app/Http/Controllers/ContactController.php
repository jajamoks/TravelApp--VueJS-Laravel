<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactSubmission;
use App\Events\ContactFormSubmitted;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     *
     * @return Response
     */
    public function show(Request $request)
    {
        $data = ['title' => 'Contact'];
        if ($request->has('interest')) {
            $data = array_merge($data, ['interest' => $request->input('interest')]);
        }
        return view('pages.contact.index', $data);
    }

    /**
     * Store the contact form submission
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'confirm_email' => 'required|same:email',
            'message' => 'required',
        ]);
        //create the submission
        $submission = ContactSubmission::create($request->all());
        //fire event
        event(new ContactFormSubmitted($submission));
        return view('pages.contact.success', ['title' => 'Contact']);
    }
}
