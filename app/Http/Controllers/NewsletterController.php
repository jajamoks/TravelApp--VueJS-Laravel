<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Events\UserSubscribedToNewsletter;
use Illuminate\Cookie\CookieJar;
use App\NewsletterSubscriber;
use App\Events\UserVerifiedEmail;

class NewsletterController extends Controller
{

    public function store(CookieJar $cookieJar, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscriber_email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return redirect('/newsletter')
                        ->withErrors($validator)
                        ->withInput();
        }
        $subscriber = NewsletterSubscriber::create($request->all());
        event(new UserSubscribedToNewsletter($subscriber));
        $dismissedCookie = cookie(
            'newsletter_dismissed',
            'true',
            86700 * 60,
            '/',
            preg_replace('#^https?://#', '', $request->root()),
            false,
            false
        );
        $cookieJar->queue($dismissedCookie);
        return view('pages.newsletter', [
            'title' => 'Success', 'success' => true
        ]);
    }

    public function create()
    {
        return view('pages.newsletter', ['title' => 'Subscribe to Newsletter']);
    }

    public function verify(Request $request, $token)
    {
        $subscriber = NewsletterSubscriber::where(
            'verification_token',
            $token
        )->firstOrFail();
        if (!$subscriber->verified) {
            $subscriber->verified = true;
            $subscriber->save();
            event(new UserVerifiedEmail($subscriber));
        }

        return view('pages.newsletter-success');
    }
}
