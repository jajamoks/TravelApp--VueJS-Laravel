<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MarakeeshSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = App\EscapeType::create([
            'name' => 'Rock the Casbah',
            'description' => 'Join ESCAPE TO SHAPE on an exclusive journey to magical Marrakech, Morocco. Experience the vast wonders of this exotic city- a combination of luxurious accommodations in a private desert Kasbah, results driven + fun & sweaty fitness classes classes, rich Arabic traditions, chaotic marketplaces, hidden treasures of the souks and breathtaking natural beauty- from the desert and the garden of YSL to the majestic Atlas Mountains. Along with the cultural and natural wonders, guests will enjoy an invigorating yet relaxing hammam, meandering through the marketplace, belly-dancing lessons, a camel trek through Berber villages and a cooking class on how to prepare traditional Moroccan cuisine, plus many other cultural surprises.',
            'accomodations' => 'While in Marrakech guests will stay in an authentic Moroccan desert style home, perfectly situated between the majestic Atlas Mountains and the exotic Medina. The villa is uniquely decorated with a crisp, modern twist, cleverly combining traditional Moroccan color, textures and fabrics with a modern play of light and comfort. Each suite is spacious and airy with private en-suite bathrooms, terrace, air conditioning and deluxe amenities, decorated in a traditional Moroccan meets modern style- from antique furniture carved out of solid walnut to leather club chairs and lavish carpets from the Middle Atlas region. The luxurious property is complete with an expansive pool, a traditional Berber tent ideal for afternoon tea or post dinner conversation, and an exquisite rose garden that splashes color throughout the property. Additionally, the property is host to a variety of unique indoor & outdoor spaces, ideal for inspiring each fitness class.',
            'country' => 'Morrocco',
            'region' => 'Marrakech',
            'wellness_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'nutrition_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'home_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'unique_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'itinerary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
        ]);

        $testimonials = [
            ['content' => 'I have travelled quite a bit over the years and this trip to Marrakech was remarkable in so many ways. I had never been to Morocco and wasn’t sure if my French would pass muster there. Let me tell you, it was amazing. I felt so taken care of from the moment I arrived. The villa was beautiful. My room was beautiful with a full balcony overlooking the desert. The food was great and varied. The staff was so efficient and friendly. And indulged me and helped me with my French. We were very busy with yoga or Pilates classes every day with a world-class teacher. We had cooking classes, an amazing and challenging hike on The Atlas Mts. (with a beautiful picnic on the most breathtaking place I’ve ever seen in the middle of it). The Medina was a great place to explore. To top it off, we had a belly dancing class! The owners of Escape to Shape really have a sense of how to create an atmosphere of fun and excitement for the group. They encourage, but don’t make you participate in anything you are not comfortable with. You could very easily just sit by the gorgeous pool all day if you choose. I will never forget it… I look forward to joining Erica and Francesco in the future. A really swell vacation!',
            'name' => 'Patrick',
            'date' => Carbon::createFromDate(2009, 6, 1)],
            ['content' => 'I decided to go to Escape to Shape after seeing an advertisement on the Internet and while I was a bit apprehensive before I arrived, I had one of the best vacations and I have traveled extensively.Escape to Shape creates a vacation that has four integral parts, a great place to stay, exercise, good food and good company, all somebody has to do is to arrive, whether it is by themselves or with a couple friends and let themselves relax and enjoy, this time it was in Morocco.The villa and the area around it were gorgeous. There was a pool, multiple patios, a beautiful backyard that included a Berber tent and a rose garden.The exercise included yoga and hiking. While I was there, Erica was the yoga teacher and she taught a challenging class that was appropriate for all levels. The hikes were great. The Atlas Mountains are host to beautiful scenery.Cooking Classes do not really pique my interest but I did learn how to cook a tagine. I thought the food was delicious and mealtime was my favorite because the discussion at the meals were international, topical, interesting and spirited. This only added to my vacation.In the end, Escape to Shape delivered a great week in Morocco, where I experienced the culture, the Medina, the countryside, yoga, belly dancing, and good company. I would recommend this trip for anyone who is looking to relax, exercise, see a new place and reads a newspaper once and a while.',
            'name' => 'travelfromnyc',
            'date' => Carbon::createFromDate(2010, 4, 1)],
            ['content' => 'My vacation with the Escape to Shape program to Morocco was one of my favorite vacations yet! The Escape to Shape team was a ton of fun, very attentive and knowledgeable, making me feel safe and comfortable in an exotic place. Having traveled much of Europe and other parts of the world, this was a preferable way to experience a country and culture fully. The itinerary was full of experiential cultural activities.The yoga and exercise programs were well woven into the experience as a whole. The accommodations were great and had obviously been give much care and thought. The food was wonderful and true to the culture. There was much laughing and moments of peace and relaxation. All in all, if you are thinking of planning a great vacation with great people and experiences,Escape to Shape is the way to go. I will definitely be planning more trips with them!',
            'name' => 'livetotravel',
            'date' => Carbon::createFromDate(2013, 5, 1)],
            ['content' => 'I just returned from a wonderful holiday with Escape To Shape. I was more than impressed with the accommodations, staff, owners and services. The week I was there was full of an international crowd & I found it refreshing to be surrounded by fun, intelligent people who talked about more than what to wear or the weather…. yoga and exercise classes were challenging and the excursions provided me with an inside view of the Moroccan culture. I loved the cooking classes, which were informal, but fun and practical- I will be able to make the couscous and tagine now for my friends and family! I even enjoyed the belly dancing lessons, which were taught by a lovely Moroccan girl. I would definitely recommend this trip to anyone. I’m actually planning to bring my husband on a trip this fall.',
            'name' => 'NYyoga',
            'date' => Carbon::createFromDate(2014, 5, 1)],

        ];
        $testimonials = collect($testimonials)->map(function ($item, $index) {
            return new App\Testimonial(array_merge($item, ['approved' => 1]));
        });

        $type->testimonials()->saveMany($testimonials);

        $features = [
            ['content' => '7 nights luxury accommodations in an exclusive Moroccan Desert Villa. Each luxurious room is spacious with an en suite bathroom, terrace, air conditioning and deluxe amenities.'],
            ['content' => '3 delicious & healthy meals & snacks reflective of the region & the season provided daily. Meals will be enjoyed in the private villa and in some of Marrakech’s chic restaurants & cafes.'],
            ['content' => 'Daily (twice daily on some days!) fitness classes combining dance, martial arts, Pilates & yoga'],
            ['content' => 'Morning Power Walks'],
            ['content' => '
                Guided private cultural tours to discover the history & people of this unique region. Activities include:
                Guided hike and Berber picnic in the Atlas Mountains
                A guided walking historical tour of the ancient Medina
                An ‘insider access’ guided shopping tour of the Medina & French Quarter
                A camel trek through Berber villages
                A visit to the famed Majorelle Gardens (YSL Gardens)'],
            ['content' => 'Belly dancing lessons'],
            ['content' => 'Cooking demonstration focusing on healthy ways to enjoy the foods of the region at home'],
            ['content' => 'Group hammam experience'],
            ['content' => 'Round trip ground transportation from the Marrakech Menara airport (RAK) to the Villa.'],
            ['content' => 'Free time to relax poolside or enjoy the luxurious private villa spa​'],
            ['content' => 'Additional cultural surprises'],
            ['content' => 'Tax'],
            ['content' => 'WELLNESS ACTIVITIES: Daily Fitness Classes, Atlas Mountain hike & power walks​​'],
        ];

        $features = collect($features)->map(function ($item, $index) {
            return new App\EscapeFeature(
                array_merge($item, ['order' => $index + 1])
            );
        });
        $type->features()->saveMany($features);

        $teacher = App\TeamMember::where('name', 'Teddi Bryant')->get()->first();
        $type->teachers()->save($teacher, ['order' => 1]);

        $escape = new App\Escape([
            'single_rooms' => 10,
            'shared_rooms' => 20,
            'start_date' => Carbon::createFromDate(2017, 4, 22),
            'end_date' => Carbon::createFromDate(2017, 4, 29),
            'deposit_amount' => 150000,
            'shared_rate' => 420000,
            'single_rate' => 550000
        ]);
        $escape = new App\Escape([
            'single_rooms' => 10,
            'shared_rooms' => 20,
            'start_date' => Carbon::createFromDate(2017, 12, 27),
            'end_date' => Carbon::createFromDate(2018, 1, 2),
            'deposit_amount' => 150000,
            'shared_rate' => 420000,
            'single_rate' => 550000
        ]);
        $type->escapes()->save($escape);
    }
}
