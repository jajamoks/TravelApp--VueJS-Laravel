<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = App\EscapeType::create([
            'name' => 'Adventures In Atacama',
            'description' => 'Join ESCAPE TO SHAPE on an exclusive journey to one of the world’s most unusual landscapes- the Atacama Desert, Chile. Located 8,200 feet above sea level, the Atacama Desert rises from the Pacific Ocean up to the Altiplano, the foothills of the Andes, ‘a place so vast time & direction seem to have no meaning.’
            The Atacama Desert is a unique playground. With its true year-round adventure offerings and some of the most austere and stunning natural beauty in the world, this region in the extreme north of Chile attracts intrepid spirits who can play as intensively, or as mellow-ly, as they like: horseback riding in the Moon Valley of the Salt mountain range, ‘skiing’ down sand dunes, trekking to geysers, biking through gorges, summiting volcanoes, walking to Laguna Chaxa, where pink flamingos prevail and dipping in the hot springs, the list of experiences goes on and on.
            While in Atacama guests will see & do some of the ‘coolest’ things ever, underneath the stars of one of the clearest skies on earth. Even the most experienced travelers will be impressed by what they see and experience in this spectacular natural playground.We have worked with explora to curate a truly unique Escape To Shape itinerary- one that combines all the luxury, exploration and knowledge explora is known for along with unique destination yoga & dining experiences & some special activities only available to Escape To Shape guests. The Atacama, Chile Escape To Shape at explora will truly give guests the opportunity to disconnect from their everyday lives and reconnect with themselves.',
            'accomodations' => '<p>While in Atacama guests will stay at the award winning explora hotel, where they will experience the ‘art of travel’- combining beautiful accommodations in a remote location, with in-depth exploration and the luxury of the experience- for at explora the details, the simplicity and the real joys of life are the essential elements, allowing nature to be the star of the show.
            <p>Explora has been designed in harmony with nature, to link man to the mysteries of nature, offering a luxurious oasis ideal for sharing healthy, fresh meals & delicious Chilean wines after a full day of once-in-a-lifetime experiences. Rooms are well –appointed with en-suite bathrooms and modern amenities. The property also hosts a lovely swimming pool, sauna, steam room, spa and open-air Jacuzzi ideal for soaking tired muscles after a long day of exploring.
            <p>Please note that we will not have exclusive use of explora, as there are 50 rooms, but we will have are own private guides, explorations, destination meals & yoga classes along with a unique itinerary designed specifically for Escape To Shape.Also, please note that there are no televisions in the rooms and WIFI is only available in the common areas. This is a true ‘disconnect to reconnect’ Escape!',
            'country' => 'Chile',
            'region' => 'Atacama',
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
            ['content' => '7 nights in a ‘Yala’ suite at the world-renowned explora hotel. Each suite is spacious, designed in harmony with nature, with desert views and deluxe amenities'],
            ['content' => '3 delicious & healthy meals & snacks reflective of the region & the season are provided daily.'],
            ['content' => 'Unique destination dining experiences designed to enhance or offer a closer perspective of each experience.'],
            ['content' => 'Daily Yoga- many classes will take place in unique destinations throughout the region.'],
            ['content' => 'Private unique hiking, biking & horseback riding experiences expertly guided to suit each person’s individual level. For those that do not want to hike, bike or ride horses there are alternate means of transport so that you too can experience the natural beauty and history of the region. Hikes include, Salt Flats,Flamingos of Laguna Chaxa,Trekking to geysers,Biking through gorges,Summiting volcanoes,The celestial observatory,Valley of the moon, Puritama hot springs and many more surprises'],
            ['content' => 'Cultural excursions include a historical walking tour, day trip to explore the beauty of the Rosario Islands, an ‘insider access’ shopping tour and a dip in the natural, yet rustic, mud baths'],
            ['content' => 'Use of the property’s swimming pool, sauna, steam bath and open-air jacuzzi'],
            ['content' => 'Round trip ground transportation from the Calama, Chile airport (CJC)'],
            ['content' => 'Round trip ground transportation from the Cartagena International Airport (CTG) to the private villa.'],
            ['content' => 'Tax'],
            ['content' => 'WELLNESS ACTIVITIES: Yoga, hiking, biking & horseback riding- please note that this is a very active Escape'],
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
            'start_date' => Carbon::createFromDate(2017, 11, 4),
            'end_date' => Carbon::createFromDate(2017, 11, 11),
            'deposit_amount' => 150000,
            'shared_rate' => 580000,
            'single_rate' => 650000
        ]);
        $type->escapes()->save($escape);
    }
}
