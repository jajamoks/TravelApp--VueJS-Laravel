<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BhutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = App\EscapeType::create([
            'name' => 'A Journey Through Bhutan',
            'description' => '<p>Join ESCAPE TO SHAPE on a most magical journey to the enchanting Kingdom of Bhutan. Experience the vibrant colors, the sweet sounds of chanting & nature and the overwhelming sense of peacefulness that permeates this spectacular region If you are ready to be transported to a land of highlands & prayer flags, monasteries & markets, mountains & magic then the ethereal Kingdom of Bhutan is indeed for you!
            <p>We have put together a unique, bespoke itinerary that combines A LOT of hiking, culture and relaxation as we journey deep into the Kingdom’s heartland exploring three distinctly different but important valleys; the bustling capital of Thimphu in a valley dotted with monuments, museums and markets; the almost tropical Punakha valley with its magnificent Dzongs; and the emerald valley of Paro with its rice paddies and ancient temples. Throughout our adventure we return nightly to the simple luxury and comfort of our Uma suites.<p>A FEW IMPORTANT THINGS TO NOTE:
            <p>This Escape includes a lot of Easy to Moderate hiking, and one Moderate to Hard hike (Tiger’s Nest). The duration of these activities range from 4-8 hours. This includes driving time, time to stop and take photos, time for cultural discussions and for breaks as needed. The hikes, while physical, are also a way to experience the culture & natural beauty of the Kingdom. Proper footwear is required.
            <p>Be prepared to spend time in a vehicle as the roads between Paro, Thimphu & Punakha can be unpredictable. The cars are comfortable but the driving time is roughly 4 hours.
            <p>The rates listed are based on everyone arriving & departing as a group. If you plan to stay on longer than the above mentioned itinerary you will be responsible for the additional Government surcharges, royalty fees, tariffs and FIT fees.
            <p>Passport must be valid for 6 months past the date of entry and have at least ONE blank page.',
            'accomodations' => '<p>Uma by COMO, Paro and Uma by COMO, Punakha will serve as our intimate accommodations in Bhutan, a landlocked Himalayan Kingdom where religion and nature have come together in a compelling Buddhist culture. Both properties are instilled with the same principles, for Uma means ‘living house’ and both are inspired by the landscape, spirituality and culture of the special region, heavily steeped in the traditions that surround them. They serve as the ideal locations—among pine-clad valleys, lush vegetation, rushing rivers and snow-capped mountains—for those to whom the joy of discovery is reason enough for a journey.
            <p>Please note that due to the size of the properties (169 rooms at the Metropolitan Bangkok & 29 rooms at Uma by COMO, Paro), we will not have exclusive use of Metropolitan Bangkok by COMO or Uma by COMO, Paro, rather, we will be sharing them with other discerning travelers. We will have exclusive private use of Uma by COMO, Punakha.',
            'country' => 'Bhutan',
            'region' => 'Paro & Punakha',
            'wellness_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'nutrition_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'home_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'unique_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'itinerary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
        ]);

        $testimonials = [
            ['content' => 'I SO loved and long for our time in Bhutan. It will be with me forever!All I can say is thanks beyond belief for the best experience of my life! Hope to travel with you again soon.',
            'name' => 'K.',
            'date' => Carbon::createFromDate(2016, 3, 1)],
            ['content' => 'I just wanted to thank you again for opening this door for all of us. It is a gift that will remain with me forever. Words can’t convey just how grateful I am for all that you and Francesco do for each one of us with these journeys. Truly an experience of a lifetime that I will never, ever forget!',
            'name' => 'S.C.',
            'date' => Carbon::createFromDate(2016, 3, 1)]
        ];
        $testimonials = collect($testimonials)->map(function ($item, $index) {
            return new App\Testimonial(array_merge($item, ['approved' => 1]));
        });

        $type->testimonials()->saveMany($testimonials);

        $features = [
            ['content' => 'One (1) night at The Metropolitan by COMO in Bangkok (August 12)'],
            ['content' => 'Round trip ground transportation from the Bangkok Airport to The Metropolitan by COMO'],
            ['content' => 'Seven (7) nights accommodations in Bhutan at the luxurious COMO properties in Paro and Punakha.'],
            ['content' => 'All delicious and healthy meals reflective of the region & the season, including unique destination dining experiences in the area'],
            ['content' => 'Privately guided hikes and experiences to explore the dzongs (fortresses), monasteries, temples, markets & mountains of the Kingdom. Highlights include Taktsang Monastery (Tiger’s Nest), rafting in Punakha, Temple of the Divine Madman + much, much more.'],
            ['content' => 'One 60 minute massage'],
            ['content' => 'Daily Vinyasa yoga'],
            ['content' => 'Use of the gym, steam room & indoor pool at Uma Paro'],
            ['content' => 'Round trip flights from Bangkok, Thailand to Paro, Bhutan on Druk Air'],
            ['content' => 'Bhutanese Government Visa + Royalty fees + tariffs'],
            ['content' => 'Monk donations & blessings'],
            ['content' => 'Numerous cultural surprises and off-the-beaten path experiences'],
            ['content' => 'Wireless Internet'],
            ['content' => 'Taxes'],
            ['content' => 'Round trip ground transportation from the Siem Reap International Airport (REP) to the Villa.'],
            ['content' => 'WELLNESS ACTIVITIES: Yoga, meditation & lots of walking']
        ];

        $features = collect($features)->map(function ($item, $index) {
            return new App\EscapeFeature(
                array_merge($item, ['order' => $index + 1])
            );
        });
        $type->features()->saveMany($features);

        $erica = App\TeamMember::where('name', 'Erica Gragg')->get()->first();
        $type->teachers()->save($erica, ['order' => 1]);

        $escape = new App\Escape([
            'single_rooms' => 10,
            'shared_rooms' => 20,
            'start_date' => Carbon::createFromDate(2017, 8, 19),
            'end_date' => Carbon::createFromDate(2017, 8, 27),
            'deposit_amount' => 560000,
            'shared_rate' => 920000,
            'single_rate' => 1120000
        ]);
        $type->escapes()->save($escape);
    }
}
