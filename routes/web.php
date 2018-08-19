<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::feeds();

Route::get(
    '/',
    'HomeController@index'
)->name('public.home');

Route::get('/about', function () {
    return view('pages.about');
})->name('public.about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('public.contact');

Route::get(
    '/shop',
    'ShopController@index'
)->name('public.shop');

Route::get('/travel-insurance', function () {
    return view('pages.travel-insurance');
})->name('public.travel-insurance');

Route::get(
    '/reviews',
    'TestimonialsController@showPage'
)->name('public.reviews');

Route::get(
    '/calendar',
    'CalendarController@index'
)->name('public.calendar');

Route::get('/policies', function () {
    return view('pages.policies.index');
})->name('public.policies');

Route::get(
    '/escapes',
    'EscapeController@list'
)->name('public.escapes');

Route::get(
    '/escapes/{slug}',
    'EscapeController@single'
)->name('public.escape');

Route::get(
    '/press',
    'PressController@showIndex'
)->name('public.press');

Route::get(
    '/press/{slug}',
    'PressController@showPress'
)->name('public.press.post');

Route::get(
    '/press/tags/{tag}',
    'PressController@showPressByTag'
)->name('public.press.tags');

Route::post(
    '/press/search',
    'PressController@PressSearch'
);

Route::get('/escape-artist', function () {
    return view('pages.escape-artist.index');
})->name('escape-artist');

Route::get('/destination-detox', function () {
    return view('pages.destination-detox.index');
})->name('destination-detox');

Route::get(
    '/luxury-travel-advisors',
    'TravelAdvisorController@showIndex'
)->name('public.travel-advisors');

Route::get(
    '/luxury-travel-advisors/team',
    'TravelAdvisorController@showTeam'
)->name('public.team');

Route::get(
    '/luxury-travel-advisors/private-travel-bespoke-escapes',
    'TravelAdvisorController@showPrivateTravel'
)->name('public.private-travel');

Route::post(
    '/luxury-travel-advisors/private-travel-bespoke-escapes',
    'TravelAdvisorController@storeInterest'
)->name('public.travel-interest');

Route::get(
    '/luxury-travel-advisors/inspiration',
    'TravelAdvisorController@showInspiration'
)->name('public.inspiration');

Route::get(
    '/contact',
    'ContactController@show'
)->name('public.contact');

Route::post(
    '/contact',
    'ContactController@store'
)->name('contact-submit');

Route::get('/e2s-admin', function () {
    if (Auth::user() && Auth::user()->can('view-admin')) {
        return view('admin');
    } else {
        return redirect('/login');
    }
});
Route::post(
    '/escape-cart',
    'EscapeCartController@store'
)->name('escape-cart');

Route::get('/escape-cart', function () {
    return redirect('/reservations');
});

Route::get(
    '/reservations/success',
    'ReservationsController@showSuccess'
)->name('reservation-success');

Route::resource(
    '/reservations',
    'ReservationsController'
);

Route::get(
    '/newsletter',
    'NewsletterController@create'
)->name('public.newsletter');

Route::post(
    '/newsletter',
    'NewsletterController@store'
)->name('newsletter-signup');

Route::get(
    '/newsletter/verify/{token}',
    'NewsletterController@verify'
)->name('email-verification');

Route::get(
    '/blog',
    'BlogController@showIndex'
)->name('public.blog');

Route::get(
    '/blog/category/{category}',
    'BlogController@showPosts'
)->name('public.blog.categories');

Route::get(
    '/blog/tags/{tag}',
    'BlogController@showPostsByTag'
)->name('public.blog.tags');

Route::get(
    '/blog/{slug}',
    'BlogController@showPost'
)->name('public.blog.post');

Route::get(
    '/blog/archive/{year}/{month}',
    'BlogController@showArchivePosts'
)->name('public.blog.archive');

Route::post(
    '/blog/search',
    'BlogController@search'
);

Auth::routes();

Route::get(
    'logout',
    '\App\Http\Controllers\Auth\LoginController@logout'
);

Route::get('/account', 'AccountController@index')->name('account');

Route::get('/sitemap.xml', 'SiteMapController@index');


//FOR DEBUGGING EMAILS
Route::group(['middleware' => 'admin'], function () {

    Route::get('/email/contact', function () {
        return view('email.contact_submission', [
            'name' => 'Chris',
            'email' => 'qwales1@gmail.com',
            'content' => 'hdhhddhdhhhdhdhdhdhd',
            'subject' => 'Contact Form Submitted'
        ]);
    });

    Route::get('/email/reservation', function () {
        $reservation = App\Reservation::get()->keyBy('id')->max();
        return view('email.reservation', [
            'reservation' => $reservation,
            'subject' => 'Reservation Confirmed'
        ]);
    });

    Route::get('/email/payments', function () {
        $reservation = App\Reservation::get()->keyBy('id')->max();
        return view('email.payment', [
            'reservation' => $reservation,
            'subject' => 'Payment Received'
        ]);
    });

    Route::get('/email/balance', function () {
        $reservation = App\Reservation::get()->keyBy('id')->max();
        return view('email.reminders.balance', [
            'reservation' => $reservation,
            'subject' => 'Escape Balance Reminder'
        ]);
    });

    Route::get('/email/away-message', function () {
        return view('email.away-message', [
            'subject' => "We'll Be In Touch Soon"
        ]);
    });

    Route::get('/email/payment-notification', function () {
        $reservation = App\Reservation::get()->keyBy('id')->max();
        return view('email.notifications.reservation', [
            'reservation' => $reservation,
            'subject' => 'Payment Received',
            'is_notification' => 1
        ]);
    });

    Route::get('/email/trip_info_reminder', function () {
        $reservation = App\Reservation::get()->keyBy('id')->max();
        return view('email.reminders.missing-trip-info', [
            'reservation' => $reservation,
            'subject' => 'Your Upcoming Escape to '.$reservation->escape->escape_type->location
        ]);
    });
});
