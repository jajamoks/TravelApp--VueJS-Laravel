<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CambodiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = App\EscapeType::create([
            'name' => 'Temples & Beyond',
            'description' => 'Join ESCAPE TO SHAPE in captivating Cambodia- a kingdom with an unrivalled wealth of history & culture. Nowhere is this better symbolized than at the majestic temples of UNESCO protected Angkor Wat, a timeless testament to the ingenuity of the Khmer people, and the focal point of this exciting Escape. And while a visit to the temples of Angkor is a profound experience, as few sites on earth can match the majesty of Angkor Wat, there is so much more to this remarkable country. Join Escape To Shape as we explore not only the temples, but also far beyond- the beautiful & inspiring people, the simple villages, the culinary treats, the hidden temples, the unique craftsmanship, the rich Buddhist traditions, plus much, much more.',
            'accomodations' => 'While in Cambodia guests will stay in beautiful private villas nestled amongst rice paddies and palm trees, just minutes away from the town of Siem Reap and the magnificent temples that make up Angkor Wat. Each spacious suite is complete with an en suite bathroom, plush linens, air conditioning, ceiling fans and deluxe amenities and is freshly appointed with beautiful Khmer art and textiles. An expansive pool, lotus pond and lush garden all splash color throughout the property making this villa truly complete. Additionally, the property is host to a variety of unique indoor & outdoor spaces, ideal for practicing and inspiring each yoga session. A sense of tranquility, beauty. and spaciousness that is unique to Cambodia permeates the property. The gracious and accommodating staff, along with the rich history and culture of the area, makes this a most memorable and magical Escape.',
            'country' => 'Cambodia',
            'region' => 'Siem Reap',
            'wellness_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'nutrition_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'home_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'unique_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'itinerary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
        ]);

        $testimonials = [
            ['content' => 'I went to Cambodia with Escape to Shape in February 2012 and it was AMAZING. This was my third Escape (and that should tell you how wonderful these trips are if I keep coming back!) and I loved every second. From the accommodations (an outdoor shower?! huge bed? sofa to relax on?? a little porch to sit on and watch the stars???) to the food (healthy and fresh and yummy) to the yoga (so good to stretch & move after the flights!) to the amazing amazing amazing experiences (cooking class with a visit to a local family’s house to see how they cook; participating in an alms ceremony with the monks; walking thru the local village & interacting with the villagers in meaningful ways; walking thru and having dinner in the rice fields; visiting the food market; shopping in the night market; and the TEMPLES!!!!!) this trip was more than I had hoped for but definitely not less than I expected. Escape puts together spectacular trips and the hosts Erica and Francesco go out of their way to make you happy. I can\'t say enough positive things about Escape To Shape. But I can confess that a few days after I returned from Cambodia I put my deposit on the October trip to Cartagena. Hooray!',
            'name' => 'April',
            'date' => Carbon::createFromDate(2012, 4, 1)],
            ['content' => 'I went to Cambodia and Istanbul with E2S. This is a truly wonderful way to travel, especially if you’re going at it alone. Erica is a terrific host who puts together trips that are culturally relevant in every way: local food, art, shopping and more. But it’s also a true vacation. You can do as little or as much as you like…no pressure. You can also go home in better shape than you came. Power walks, yoga, etc. The Cambodia trip was spectacular. Istanbul was a “city trip” that was just amazing…we did yoga & Pilates in the ancient cisterns! I plan on going on many more Escape To Shape trips.',
            'name' => 'Member Profile Trip Advisor',
            'date' => Carbon::createFromDate(2012, 4, 1)]
        ];
        $testimonials = collect($testimonials)->map(function ($item, $index) {
            return new App\Testimonial(array_merge($item, ['approved' => 1]));
        });

        $type->testimonials()->saveMany($testimonials);

        $features = [
            ['content' => '7 nights luxury accommodations in a private villa nestled amongst the rice paddies & palm trees of Siem Reap. Accommodations include en suite bathrooms, plush beds, luxury linens, and private terraces overlooking the pool or garden and deluxe amenities.'],
            ['content' => '3 delicious & healthy meals & snacks reflective of the region & the season are provided daily. Meals are enjoyed in the villa as well as in noted restaurants of the region.'],
            ['content' => 'Daily Vinyasa Yoga'],
            ['content' => 'Private temple tours of all the major temple ‘players’- Angkor Wat, Angkor Thom, Ta Prohm and Beng Mealea'],
            ['content' => 'Experience the beauty & stillness of Angkor Wat at Sunrise'],
            ['content' => 'Private boat trip to stilted & floating villages'],
            ['content' => 'Private Apsara dance performance'],
            ['content' => 'Private Buddhist monk chat at local Pagoda, including private alms ceremony & water ceremony'],
            ['content' => 'rivate village walk & talk- an opportunity to discover the ‘soul’ of Cambodia- meet the people; see where they live and how they spend their days. This experience includes a hands-on opportunity to give back to the local people, if interested.'],
            ['content' => 'rivate sunset cocktails & dinner overlooking the rice field'],
            ['content' => 'Private Cooking class – 1/2 day hands-on cooking class- visit the local ‘wet’ market with the chef & learn to make traditional favorites'],
            ['content' => 'Opportunities to explore the famous Night Market as well as local boutiques that support the local people'],
            ['content' => 'xperience Phare- The Cambodian Circus- up close with the acrobats & behind the scenes'],
            ['content' => '1 massage'],
            ['content' => 'Additional cultural surprises'],
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
            'start_date' => Carbon::createFromDate(2017, 9, 2),
            'end_date' => Carbon::createFromDate(2017, 9, 9),
            'deposit_amount' => 150000,
            'shared_rate' => 400000,
            'single_rate' => 520000
        ]);
        $type->escapes()->save($escape);
    }
}
