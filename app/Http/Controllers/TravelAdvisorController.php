<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamMember;
use App\ContactSubmission;
use App\Events\PrivateTravelFormSubmitted;

class TravelAdvisorController extends Controller
{
    public function showIndex()
    {
        return view('pages.travel-advisors.index');
    }

    public function showTeam()
    {
        $members = TeamMember::where('name', '<>', 'Erica Gragg')->get();
        return view('pages.travel-advisors.team', compact('members'));
    }

    public function showPrivateTravel()
    {
        return view('pages.travel-advisors.private');
    }

    public function showInspiration()
    {
        return view('pages.travel-advisors.inspiration');
    }

    public function storeInterest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'confirm_email' => 'required|same:email',
            'type_of_travel' => 'required',
            'destinations_of_interest' => 'required',
            'dates' => 'required',
            'length_of_stay' => 'required',
            'main_objective' => 'required',
            'budget' => 'required',
            'how_did_your_hear' => 'required'
        ]);
        $message = "
            Type Of Travel : {$request->get('type_of_travel')}\n
            Destinations of Interest : {$request->get('destinations_of_interest')} \n
            Dates: {$request->get('dates')} \n
            Length of Stay : {$request->get('length_of_stay')} \n
            Main Objective : {$request->get('main_objective')} \n
            Budget: {$request->get('budget')}
            How Did Your Hear About Us? : {$request->get('how_did_your_hear')}
        ";
        $submission = ContactSubmission::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'message' => $message,
            'interest' => $request->get('interest')
        ]);
        event(new PrivateTravelFormSubmitted($submission));
        return view('pages.contact.success', ['title' => 'Private Travel']);
    }
}
