<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LakeComoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = App\EscapeType::create([
            'name' => 'Full-On Fitness in Lake Como',
            'description' => 'Join ESCAPE TO SHAPE on an exclusive & magical journey to majestic Lake Como- long considered one of the most beautiful lakes in the world. Home to breathtaking historical villas, lush botanical gardens, charming streets and magnificent natural beauty- from the deep blue of the lake to the vibrant green on the surrounding alpines, the unparalleled beauty of this location is sure to inspire our outdoor Pilates, yoga classes, hikes and circuit training. Join us and experience the magnificent charm of this unique region, which has inspired writers such as Hemingway, Twain and Dostoevsky throughout the ages: a combination of a glorious lake, mountains, Italian history & food, charming lakeside villages and breathtaking natural beauty. Along with the cultural and natural wonders of the region, cooking classes, wine tasting, shopping & cultural surprises all compliment this unique getaway.',
            'accomodations' => '<p>While at Lake Como, ESCAPE TO SHAPE offers guests the rare opportunity to stay in an exclusive 19th century villa set on five acres of private extensive gardens- complete with a swimming pool, tennis courts and unparalleled views of majestic Lake Como, as well as the beautiful mountains just across the lake- truly inspiring views for daily Pilates, Yoga & Circuit Training sessions!
            <p>The interior of the villa is spacious, with shining floors and a sweeping staircase. Recently restored, our ‘home away from home’ in Lake Como maintains its traditional elegant, grand atmosphere- full of family antiques, expansive dining tables & lots of natural light.

            <p>Each bedroom is unique, decorated in a traditional style, with en suite modern bathrooms, air conditioning, luxurious linens and amenities.

            <p>Ideally located on Lake Como, minutes away from the charming town of Menaggio, perfectly situated for hiking, private boat trips to explore the beauty & charm of Lake Como, shopping and unique dining experiences. A stay in this private villa is an experience in and of itself.

            <p>Please note that this is a villa, and not a hotel, therefore some rooms are more spacious than others, and likewise some rooms have better views than others. Rooms will be assigned on a first come, first served basis. All rooms are comfortable and well appointed, decorated in a traditional Old Italian style.',
            'country' => 'Italy',
            'region' => 'Lake Como',
            'wellness_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'nutrition_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'home_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'unique_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            'itinerary' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
        ]);

        $testimonials = [
            ['content' => 'The trips hosted by Escape to Shape are an amazing way to enjoy your time off. The trips are the perfect mix of high quality service, outstanding food, exotic locations, physical activity, spiritual well-being and cultural activities. In a nutshell, if you are looking for time to spend by yourself, with a friend or spouse, Escape to Shape has something for everyone. I have been on 2 Escape to Shape trips and they were both magical in their own unique ways. The rooms are spacious, clean and surrounded by nature. The food is outstanding – healthy, fresh, ethnic. The locations are exotic, safe and stimulating. The service is attentive, warm, and caring. The yoga is outstanding – with wonderful teachers from around the world who are all incredibly inspiring. The cultural activities are wonderful – unique to the location, adventurous and memorable. Most importantly, the trip feels like a home away from home. The hosts and guests of Escape to Shape are warm, inviting and sharing. You leave the trips with new experiences, new friends and a renewed sense of well-being. I highly recommend Escape to Shape.',
            'name' => 'NEWYORKYOGA GIRL',
            'date' => Carbon::createFromDate(2011, 9, 1)],
            ['content' => 'I was hesitant to book a group trip, considering myself a bit more of an independent traveler who likes a bit of luxury and a lot of local culture. Boy was I pleased that I did so anyway!
            The owners have your best interests in mind and they are always there, seeing to your every need. However, I didn’t need much because they did the most amazing job of planning my first group trip ever!
            They perfectly combined luxury accommodation, excellent local cuisine (even for my vegetarian needs), outdoors activities, local cultural experiences, Pilates and yoga taught by excellent teachers, and some relaxation time all into 1 week. All I needed to do was purchase a plane ticket to transport me there!
            I don’t typically write reviews, but this experience demanded that I do because it was so great. I came away feeling relaxed and energized, having learned things about the local culture, made a bunch of new friends, exercised and ate well every day and even did a little shopping!
            The all-local staff did a great job and I was happy to see that they employed people from the community there. I am definitely going to join their future trips and hope to be able to do so once every year.',
            'name' => 'Beyond Exploring',
            'date' => Carbon::createFromDate(2008, 10, 1)],
        ];
        $testimonials = collect($testimonials)->map(function ($item, $index) {
            return new App\Testimonial(array_merge($item, ['approved' => 1]));
        });

        $type->testimonials()->saveMany($testimonials);

        $features = [
            ['content' => '6 nights accommodations in an exclusive 19th century villa on breathtaking Lake Como. Each room is unique- decorated in a traditional style with an in-suite bathroom, air conditioning & amenities.'],
            ['content' => '3 delicious & healthy meals & snacks reflective of the region & the season provided daily. Meals will be enjoyed in the private villa, in some of Lake Como’s best restaurants & in unique destination dining locations around the lake.'],
            ['content' => 'Daily Vinyasa Yoga'],
            ['content' => 'Morning Power Walks'],
            ['content' => 'Daily Pilates'],
            ['content' => 'Circuit Training & Boot Camp Classes utilizing the magnificent villa garden- nature is our gym!'],
            ['content' => 'Breathtaking hikes to experience the magnificent natural beauty of the area.'],
            ['content' => 'Morning Power Walks'],
            ['content' => 'Private Boat Tour to explore the natural beauty, culture & architecture of this magical region'],
            ['content' => 'Visit to Villa Carlotta- enjoy the botanical gardens & art masterpieces of this breathtaking private villa turned museum'],
            ['content' => 'Shopping tour in charming Bellagio'],
            ['content' => 'Wine Tasting'],
            ['content' => 'Insider access to unique off-the-beaten path locations around the lake'],
            ['content' => 'Cooking lessons focusing on healthy ways to enjoy the traditional foods of the region at home'],
            ['content' => 'Free time to relax poolside, play tennis on our private court or enjoy the luxurious private villa'],
            ['content' => 'Additional cultural surprises'],
            ['content' => 'Round trip ground transportation from the Milan Malpensa International Airport (MXP) to the villa'],
            ['content' => 'Tax'],
            ['content' => 'WELLNESS ACTIVITIES: Yoga, Pilates, Circuit Training, Hiking & lots of walking'],

        ];

        $features = collect($features)->map(function ($item, $index) {
            return new App\EscapeFeature(
                array_merge($item, ['order' => $index + 1])
            );
        });
        $type->features()->saveMany($features);

        $teacher = App\TeamMember::where('name', 'Alica Wyatt')->get()->first();
        $erica = App\TeamMember::where('name', 'Erica Gragg')->get()->first();
        $type->teachers()->save($teacher, ['order' => 1]);
        $type->teachers()->save($erica, ['order' => 2]);


        $escape = new App\Escape([
            'single_rooms' => 10,
            'shared_rooms' => 20,
            'start_date' => Carbon::createFromDate(2017, 5, 29),
            'end_date' => Carbon::createFromDate(2017, 6, 4),
            'deposit_amount' => 150000,
            'shared_rate' => 450000,
            'single_rate' => 600000
        ]);
        $type->escapes()->save($escape);
    }
}
