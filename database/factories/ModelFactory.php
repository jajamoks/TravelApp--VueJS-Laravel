<?php
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'customer',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'admin', function ($faker) {
    return [
        'name' => 'Chris Wales',
        'email' => 'qwales1@gmail.com',
        'role' => 'admin',
        'password' =>  bcrypt('redsox11'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\PostCategory::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->realText($maxNbChars = 100),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->realText($maxNbChars = 50),
        'content' => $faker->unique()->sentences(100, true),
        'featured_image' => 'https://placehold.it/760x405'
    ];
});

$factory->state(App\Post::class, 'published', function ($faker) {
    return [
        'published_date' => Carbon::parse('-'. $faker->unique()->randomNumber(3). ' week')
    ];
});

$factory->state(App\Post::class, 'longTitle', function ($faker) {
    return [
        'title' => $faker->unique()->realText($maxNbChars = 100)
    ];
});

$factory->state(App\Post::class, 'withAuthor', function ($faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id
    ];
});

$factory->state(App\Post::class, 'withCategory', function ($faker) {
    return [
        'post_category_id' => factory(App\PostCategory::class)->create()->id
    ];
});

$factory->state(App\Post::class, 'unpublished', function ($faker) {
    return [
        'published_date' => Carbon::parse('+1 week')
    ];
});

$factory->state(App\Post::class, 'sparkForm', function ($faker) {
    $errObj = new stdClass();
    $errObj->errors = new stdClass();
    return [
        'title' => $faker->unique()->realText($maxNbChars = 50),
        'content' => $faker->unique()->sentences(100, true),
        'featured_image' => 'https://res.cloudinary.com/acerunning/video/upload/v1485494502/krnnbuozazpy98cqnpjl.mp4',
        'published_date' => '2017-02-15 00:02:00',
        'errors' => $errObj,
        'busy' => true,
        'successful' => false,
        'user_id' => 2,
        'post_category_id' => 2,
        'media' => [],
        'tags' => ['Tag 1', 'Tag 2', 'Tag 3']
    ];
});


$factory->define(App\ContactSubmission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'message' => $faker->sentences(5, true),
        'zip' => $faker->randomNumber(5),
        'source' => $faker->sentences(5, true),
    ];
});

$factory->state(App\ContactSubmission::class, 'missingData', function ($faker) {
    return [
        'name' => '',
        'email' => '',
        'message' => ''
    ];
});

$factory->state(App\ContactSubmission::class, 'invalidData', function ($faker) {
    return [
        'name' => 5,
        'email' => 'joe!',
        'message' => 7,
        'phone' => '123-456-7891'
    ];
});

$factory->define(App\Media::class, function (Faker\Generator $faker) {
    return [
        'public_id' => 'krnnbuozazpy98cqnpjl',
        'version' => 1485494502,
        'signature' => '1266bdc00bab3ef23fbe9bdaa62b4b34c86d47ed',
        'width' => 640,
        'height' => 360,
        'format' => 'mp4',
        'resource_type' => 'video',
        'bytes' => 3722815,
        'type' => 'upload',
        'etag' => '5d99ad494e76b8993c8ce7d79adde128',
        'url' => 'http://res.cloudinary.com/acerunning/video/upload/v1485494502/krnnbuozazpy98cqnpjl.mp4',
        'secure_url' => 'https://res.cloudinary.com/acerunning/video/upload/v1485494502/krnnbuozazpy98cqnpjl.mp4',
    ];
});

$factory->define(App\TeamMember::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'credentials' => $faker->title(),
        'bio' => $faker->sentences($number = 10, $asText = true),
        'twitter_url' => $faker->url(),
        'linkedin_url' => $faker->url(),
        'facebook_url' => $faker->url(),
        'gplus_url' => $faker->url()
    ];
});

$factory->define(App\EscapeType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->realText($maxNbChars = 50),
        'description' => $faker->unique()->sentences(25, true),
        'accomodations' => $faker->unique()->sentences(25, true),
        'itinerary' => $faker->unique()->sentences(25, true),
        'country' => $faker->realText($maxNbChars = 25),
        'region' => $faker->realText($maxNbChars = 25),
        'wellness_summary' => $faker->unique()->sentences(25, true),
        'nutrition_summary' => $faker->unique()->sentences(25, true),
        'home_summary' => $faker->unique()->sentences(25, true),
        'unique_summary' => $faker->unique()->sentences(25, true),
        'insurance_required' => true
    ];
});

$factory->define(App\Escape::class, function (Faker\Generator $faker) {
    return [
        'single_rooms' => 5,
        'shared_rooms' => 5,
        'deposit_amount' => 150000,
        'single_rate' => 600000,
        'shared_rate' => 450000,
        'payment_due' => Carbon::today()->addWeeks(3),
        'contact_info' => $faker->sentences(25, true)
    ];
});

$factory->state(App\Escape::class, 'inFuture', function ($faker) {
    return [
        'start_date' => Carbon::today()->addWeeks(4),
        'end_date' => Carbon::today()->addWeeks(5)
    ];
});

$factory->state(App\Escape::class, 'inPast', function ($faker) {
    return [
        'start_date' => Carbon::today()->subWeeks(4),
        'end_date' => Carbon::today()->subWeeks(3)
    ];
});

$factory->state(App\Escape::class, 'withType', function ($faker) {
    $escapeType = factory(App\EscapeType::class)->create();
    $media = factory(App\Media::class)->create();
    $escapeType->saveImages($media->toArray(), [$media, $media, $media]);
    return [
        'escape_type_id' => $escapeType->id
    ];
});

$factory->define(App\EscapeFeature::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->realText($maxNbChars = 100),
    ];
});

$factory->define(App\Testimonial::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'date' => Carbon::today()->subMonths(5),
        'content' => $faker->unique()->sentences(25, true)
    ];
});

$factory->define(App\Press::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->realText($maxNbChars = 50),
        'link' => $faker->url(),
        'date' => Carbon::parse('-1 month'),
        'content' => $faker->unique()->sentences(25, true)
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {
    return [
        'event' => $faker->realText($maxNbChars = 20),
        'link' => $faker->url(),
        'description' => $faker->realText($maxNbChars = 20)
    ];
});

$factory->define(App\EscapeCart::class, function (Faker\Generator $faker) {
    $escape = factory(App\Escape::class)->states([
        'withType', 'inFuture'
    ])->create();
    return [
        'room' => 'private',
        'guests' => 1,
        'escape_id' => $escape->id
    ];
});

$factory->define(App\Reservation::class, function (Faker\Generator $faker) {
    return [
        'room_type' => 'private',
        'guests' => 1
    ];
});
$factory->state(App\Reservation::class, 'withUser', function ($faker) {
    $user = factory(App\User::class)->create();
    return [
        'user_id' => $user->id
    ];
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {
    return [
        'amount' => 50000
    ];
});


$factory->define(App\EscapeItinerary::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->unique()->sentences(25, true)
    ];
});

$factory->define(App\EscapeActivity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 20),
        'date' => Carbon::today()->addWeeks(4)->addDays(1),
        'description' => $faker->unique()->sentences(4, true)
    ];
});

$factory->define(App\PackingListItem::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 20),
        'link' => $faker->url(),
        'description' => $faker->unique()->sentences(4, true)
    ];
});

$factory->define(App\ReadingListItem::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 20),
        'link' => $faker->url(),
        'description' => $faker->unique()->sentences(4, true)
    ];
});

$factory->define(App\Flight::class, function (Faker\Generator $faker) {
    return [
        'arrival_airline' =>  $faker->realText($maxNbChars = 20),
        'arrival_flight_number' =>  $faker->realText($maxNbChars = 10),
        'arrival_date' => Carbon::today(),
        'departure_date' => Carbon::today(),
        'departure_airline' => $faker->realText($maxNbChars = 20),
        'departure_flight_number' => $faker->realText($maxNbChars = 10),
        'arrival_airport' => $faker->realText($maxNbChars = 10),
        'departure_airport' => $faker->realText($maxNbChars = 10),
    ];
});

$factory->define(App\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'diet_has_restrictions' => 1,
        'diet_restrictions' =>  $faker->sentences(4, true),
        'yoga_level' => $faker->realText($maxNbChars = 10),
        'health_is_active' => 1,
        'health_activities' => $faker->sentences(4, true),
        'health_has_injuries' => 1,
        'health_injuries' =>  $faker->sentences(4, true),
        'goals' => $faker->sentences(4, true),
        'additional_info' => $faker->sentences(4, true),
        'emergency_contact_name' => $faker->name(),
        'emergency_contact_relationship' => $faker->realText($maxNbChars = 10),
        'emergency_contact_phone' => $faker->phoneNumber()
    ];
});


$factory->define(App\Waiver::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'signature' => $faker->name(),
        'signed_on' => $faker->dayofMonth().$faker->month().$faker->year(),
        'signature_confirmed' => 1
    ];
});

$factory->define(App\DiscountCode::class, function (Faker\Generator $faker) {
    return [
        'code' => uniqid(),
        'amount' => 10000,
        'type' => 'set_value'
    ];
});

$factory->state(App\DiscountCode::class, 'percentage', function ($faker) {
    return [
        'amount' => 5,
        'type' => 'percentage'
    ];
});

$factory->define(App\NewsletterSubscriber::class, function (Faker\Generator $faker) {
    return [
        'subscriber_email' => $faker->email(),
        'verification_token' => $faker->uuid(),
        'verified' => false
    ];
});
