<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CartegnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = App\EscapeType::create([
            'name' => 'Salsa, Sunshine & Sculpting',
            'description' => 'Join ESCAPE TO SHAPE on an exclusive & magical journey to Cartagena de Indias, Colombia, considered by many the gem in South America’s crown. Experience the immense charm and sophistication of this 500 + year- old UNESCO protected Spanish colonial walled city, perfectly situated on the Caribbean coast. Enjoy a combination of luxurious accommodations, yoga & circuit training classes, rich Spanish traditions, narrow cobblestone streets lined with impressive architecture and splashed with cafes, restaurants, boutiques and artisans, grand cathedrals & plazas full of life. In addition, experience the natural beauty of Cartagena, set on the turquoise waters of the Caribbean sea, with its long strands of sandy beach, lush vegetation, exotic fruits and palm lined islands just miles off the shore. Relaxing massages, salsa-dancing lessons, Spanish language lessons and cooking classes all compliment this unique cultural + fitness getaway.',
            'accomodations' => 'While in Cartagena ESCAPE TO SHAPE offer guests the rare opportunity to stay in an exclusive 16th century restored villa within the UNESCO protected colonial city walls. Imagine walking out the heavy wood doors into the narrow balcony lined, seductive streets of colonial Cartagena, steps away from famed author Gabriel Garcia Marquez’s home and haunts. Traditionally decorated, complete with original frescos from years gone by, a grand ballroom, a swimming pool in the courtyard center and many rooftop terraces designed to soak in the sun as well as the magnificent skyline of church domes, bell towers and the Caribbean Sea, a stay in this private villa is a unique experience in and of itself. Additionally, the villa boasts plenty of indoor & outdoor space ideal for practicing and inspiring each yoga & fitness class.',
            'country' => 'Colombia',
            'region' => 'Cartagena de Indias',
            'wellness_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'nutrition_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'home_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'unique_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'itinerary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
        ]);

        $testimonials = [
            ['content' => 'I went to Cartagena last fall with Escape to Shape and loved it. It was a great vacation that allowed me to have fun, keep in shape and relax in an incredible place. The best part of the trip was the amazing villa that we got to stay in. It truly made me feel like one of those people on Vh1’s “The fabulous life of the rich and famous”. I was in a huge villa in the center of the walled in city with a staff that catered to my every need. The best part of this all- inclusive vacation was that I could choose how to spend my time. They offered a wide array of activities but didn’t pressure or require you to take part in any of them. If you wanted to do yoga you could but if instead you wanted to sit on the terrace sunbathing or take a dip in the pool or hot tub you could. The owners have a great understanding of what it means to be on vacation and it leads to everyone having a great time',
            'name' => 'DCtravelman',
            'date' => Carbon::createFromDate(2012, 8, 1)],
            ['content' => 'I just returned from the Cartagena escape over Thanksgiving week and it was everything I expected and more! Erica and staff were extremely professional and so gracious. They were always asking me if I needed anything and if I was enjoying myself. They offered to help walk me to shops and ATM when I didn’t know where it was and just went above and beyond. Everything from the meals to activities were perfectly planned and flawlessly executed and I didn’t have to worry about a thing.
            The private villa was just to die for and granted, I have stayed in a number of very nice houses before. The courtyard with pool, waterfall, and fountain was just beautiful. It was huge and if you just wanted to find a quiet spot to relax you could. Definitely made a perfect choice here.
            The food was healthy yet delicious but portion sizes were definitely smaller than what I was used to but it ended up being ok. I think most Americans are used to too large portion sizes and I found that it was actually enough to fill me up without overstuffing. This was the first vacation where I didn’t go home feeling like I gained weight but rather left feeling more toned and healthy.
            I love how laid back it is and there is no pressure to participate in anything you don’t want to, unlike some other retreats I looked into who don’t like guests to use phones or computers and have mandatory activities. I also liked how there is not only yoga but also walks and sculpting classes. The whole vibe is more luxurious and relaxing than new age/hippie, which was exactly what I was looking for.
            I would recommend this especially if you are travelling by yourself and don’t want to deal with the stress and hassles. Being a young solo woman who doesn’t speak any Spanish I would never have travelled to Columbia by myself but Escape to Shape allowed me to do it. It would also be great with a girlfriend. I thoroughly enjoyed myself and will definitely be planning another trip with them!',
            'name' => 'Ceasar52',
            'date' => Carbon::createFromDate(2009, 11, 1)],
            ['content' => 'I traveled with Escape to Shape last March and it was one of the most unique and wonderful vacations of my lifetime. I was a little bit worried about traveling to a foreign county alone, but decided to go for it. What a decision? Escape to Shape was everything it advertised and more. The mansion we stayed at was amazing. The rooms were spacious and had an at home feel. The staff and owners were very friendly and accommodating. The yoga and Pilates classes were very challenging and adequate to each individuals needs. The food was splendid and very healthy. The city of Cartagena was equally charming and beautiful. The highlight of the trip was the boat ride to the Rosario Islands. The white sand beaches and crystal clear water was unlike any place I could go to in the states. I would definitely recommend this trip to anyone interested. Whether you are traveling alone or coming along with friends Escape to Shape keeps you busy and plans a trip where you leave with many new friends and get to see a county the way the natives see it',
            'name' => 'KAPRAN',
            'date' => Carbon::createFromDate(2013, 7, 1)]
        ];
        $testimonials = collect($testimonials)->map(function ($item, $index) {
            return new App\Testimonial(array_merge($item, ['approved' => 1]));
        });

        $type->testimonials()->saveMany($testimonials);

        $features = [
            ['content' => '5 nights accommodations in an exclusive colonial villa within the UNESCO protected historical city walls. Each room is spacious with an in-suite bathroom, air conditioning & amenities.'],
            ['content' => '3 delicious & healthy meals & snacks reflective of the region & the season provided daily. Meals will be enjoyed in the private villa and in some of Cartagena’s best restaurants.'],
            ['content' => 'Daily Yoga & Circuit Training classes'],
            ['content' => 'Morning power walks'],
            ['content' => 'Cooking class focusing on healthy ways to enjoy the local foods of the region at home'],
            ['content' => 'Cultural excursions include a historical walking tour, day trip to explore the beauty of the Rosario Islands, an ‘insider access’ shopping tour and a dip in the natural, yet rustic, mud baths'],
            ['content' => 'Salsa dancing lessons'],
            ['content' => 'One 60 minute massage'],
            ['content' => 'Round trip ground transportation from the Cartagena International Airport (CTG) to the private villa.'],
            ['content' => 'Tax'],
            ['content' => 'WELLNESS ACTIVITIES: Yoga, meditation, circuit training & power walks'],
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
            'start_date' => Carbon::createFromDate(2017, 10, 22),
            'end_date' => Carbon::createFromDate(2017, 10, 27),
            'deposit_amount' => 150000,
            'shared_rate' => 380000,
            'single_rate' => 450000
        ]);
        $type->escapes()->save($escape);
    }
}
