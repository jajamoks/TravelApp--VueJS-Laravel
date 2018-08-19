<?php

use Illuminate\Database\Seeder;

class PressTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('press')->delete();
        
        \DB::table('press')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'Departures',
                'link' => 'http://www.departures.com/travel/luxe-health-and-wellness-retreats/12',
                'slug' => 'departures',
                'date' => '2017-01-01 00:01:00',
                'created_at' => '2017-05-02 00:02:44',
                'updated_at' => '2017-05-02 00:02:44',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Observer',
                'link' => 'http://observer.com/2016/12/celebrate-by-chloe-s-latest-opening-and-get-in-some-cardio/',
                'slug' => 'observer',
                'date' => '2016-12-01 00:12:00',
                'created_at' => '2017-05-02 00:03:55',
                'updated_at' => '2017-05-02 00:03:55',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'Well + Good',
                'link' => 'https://www.wellandgood.com/good-sweat/healthy-holiday-gift-guide-what-to-get-the-outdoor-adventurer/slide/16/',
                'slug' => 'well+good',
                'date' => '2016-12-01 00:12:00',
                'created_at' => '2017-05-02 00:05:53',
                'updated_at' => '2017-05-02 00:05:53',
            ),
            3 => 
            array (
                'id' => 5,
                'title' => 'Well + Good',
                'link' => 'https://www.wellandgood.com/fitness-wellness-trends/',
                'slug' => 'well+good-1',
                'date' => '2016-12-01 00:12:00',
                'created_at' => '2017-05-02 00:11:02',
                'updated_at' => '2017-05-02 00:11:02',
            ),
            4 => 
            array (
                'id' => 6,
                'title' => 'Travel Weekly',
                'link' => 'http://www.travelweekly.com/Travel-News/Travel-Agent-Issues/Beyond-pampering',
                'slug' => 'travel-weekly',
                'date' => '2016-12-01 00:12:00',
                'created_at' => '2017-05-02 00:12:48',
                'updated_at' => '2017-05-02 00:12:48',
            ),
            5 => 
            array (
                'id' => 7,
                'title' => 'Everyday Power Blog',
                'link' => 'http://everydaypowerblog.com/2016/11/14/inspirational-female-entrepreneurs-using-business-for-good/',
                'slug' => 'everyday-power-blog',
                'date' => '2016-11-01 00:11:00',
                'created_at' => '2017-05-02 00:13:55',
                'updated_at' => '2017-05-02 00:13:55',
            ),
            6 => 
            array (
                'id' => 8,
                'title' => 'Bravo TV',
                'link' => 'http://www.bravotv.com/top-chef/blogs/must-drink-cocktails-in-countries-around-the-world',
                'slug' => 'bravo-tv',
                'date' => '2016-11-01 00:11:00',
                'created_at' => '2017-05-02 00:14:59',
                'updated_at' => '2017-05-02 00:14:59',
            ),
            7 => 
            array (
                'id' => 9,
                'title' => 'Bravo TV',
                'link' => 'http://www.bravotv.com/blogs/13-expert-tips-to-help-you-sleep-on-your-next-flight-really',
                'slug' => 'bravo-tv-1',
                'date' => '2016-11-01 00:11:00',
                'created_at' => '2017-05-02 00:16:42',
                'updated_at' => '2017-05-02 00:16:42',
            ),
            8 => 
            array (
                'id' => 10,
                'title' => 'Fast Company',
                'link' => 'https://www.fastcompany.com/3064971/most-innovative-companies/burned-out-americans-are-helping-wellness-tourism-flourish/',
                'slug' => 'fast-company',
                'date' => '2016-10-01 00:10:00',
                'created_at' => '2017-05-02 00:30:12',
                'updated_at' => '2017-05-02 00:30:12',
            ),
            9 => 
            array (
                'id' => 11,
                'title' => 'LaPalme Magazine',
                'link' => 'http://lapalmemagazine.com/2016/10/20/travel-expert-erica-gragg-tells-us-her-best-traveling-tips/',
                'slug' => 'lapalme-magazine',
                'date' => '2016-10-01 00:10:00',
                'created_at' => '2017-05-02 00:31:32',
                'updated_at' => '2017-05-02 00:31:32',
            ),
            10 => 
            array (
                'id' => 12,
                'title' => 'Fathom',
                'link' => 'http://www.fathomaway.com/guides/asia/laos/itineraries/what-to-do-in-luang-prabang/',
                'slug' => 'fathom',
                'date' => '2016-10-01 00:10:00',
                'created_at' => '2017-05-02 00:32:45',
                'updated_at' => '2017-05-02 00:32:45',
            ),
            11 => 
            array (
                'id' => 13,
                'title' => 'Well + Good',
                'link' => 'https://www.wellandgood.com/good-advice/life-changing-healthy-vacation-christine-connelly/',
                'slug' => 'well-good',
                'date' => '2016-10-01 00:10:00',
                'created_at' => '2017-05-02 00:33:41',
                'updated_at' => '2017-05-02 00:33:41',
            ),
            12 => 
            array (
                'id' => 14,
                'title' => 'MindBodyGreen',
                'link' => 'http://www.mindbodygreen.com/0-26628/how-to-beat-the-post-summer-blues.html',
                'slug' => 'mind-body-green',
                'date' => '2016-09-01 00:09:00',
                'created_at' => '2017-05-02 00:34:44',
                'updated_at' => '2017-05-02 00:50:04',
            ),
            13 => 
            array (
                'id' => 15,
                'title' => 'Bravo TV',
                'link' => 'http://www.bravotv.com/blogs/6-ways-going-on-vacation-actually-makes-you-better-at-your-job/',
                'slug' => 'bravo-tv-2',
                'date' => '2016-08-01 00:08:00',
                'created_at' => '2017-05-02 00:35:55',
                'updated_at' => '2017-05-02 00:35:55',
            ),
            14 => 
            array (
                'id' => 16,
                'title' => 'Yahoo Beauty',
                'link' => 'https://www.yahoo.com/beauty/practical-real-life-ways-to-1501830038077494.html/',
                'slug' => 'yahoo-beauty',
                'date' => '2016-08-01 00:08:00',
                'created_at' => '2017-05-02 00:36:59',
                'updated_at' => '2017-05-02 00:36:59',
            ),
            15 => 
            array (
                'id' => 17,
                'title' => 'Charlotte\'s Book',
                'link' => 'http://www.charlottesbook.com/080816-super-spice-recipes/',
                'slug' => 'charlotte-s-book',
                'date' => '2016-08-01 00:08:00',
                'created_at' => '2017-05-02 00:39:08',
                'updated_at' => '2017-05-02 00:39:08',
            ),
            16 => 
            array (
                'id' => 18,
                'title' => 'STYLECASTER',
                'link' => 'http://stylecaster.com/best-health-getaways/#slide-12',
                'slug' => 'stylecaster',
                'date' => '2016-07-01 00:07:00',
                'created_at' => '2017-05-02 00:40:49',
                'updated_at' => '2017-05-02 00:40:49',
            ),
            17 => 
            array (
                'id' => 19,
                'title' => 'MindBodyGreen',
                'link' => 'http://www.mindbodygreen.com/0-25541/5-essential-elements-of-the-perfect-weekend-staycation.html',
                'slug' => 'mindbodygreen',
                'date' => '2016-06-01 00:06:00',
                'created_at' => '2017-05-02 00:50:52',
                'updated_at' => '2017-05-02 00:50:52',
            ),
            18 => 
            array (
                'id' => 20,
                'title' => 'Mood of Living',
                'link' => 'https://moodofliving.com/portfolio/erica-gragg-escape-shape/',
                'slug' => 'mood-of-living',
                'date' => '2016-07-01 00:07:00',
                'created_at' => '2017-05-02 00:52:21',
                'updated_at' => '2017-05-02 00:52:21',
            ),
            19 => 
            array (
                'id' => 21,
                'title' => 'Bustle',
                'link' => 'https://www.bustle.com/articles/167672-11-super-common-myths-about-getting-fit-that-everyone-believes-busted-once-for-all',
                'slug' => 'bustle',
                'date' => '2016-06-01 00:06:00',
                'created_at' => '2017-05-02 00:53:30',
                'updated_at' => '2017-05-02 00:53:30',
            ),
            20 => 
            array (
                'id' => 22,
                'title' => 'Johnny Jet',
                'link' => 'http://www.johnnyjet.com/2016/06/travel-style-erica-gragg/',
                'slug' => 'johnny-jet',
                'date' => '2016-06-01 00:06:00',
                'created_at' => '2017-05-02 00:55:00',
                'updated_at' => '2017-05-02 00:55:00',
            ),
            21 => 
            array (
                'id' => 23,
                'title' => 'Green With Renvy',
                'link' => 'http://greenwithrenvy.com/10-eco-friendly-yoga-retreats/',
                'slug' => 'green-with-renvy',
                'date' => '2016-06-01 00:06:00',
                'created_at' => '2017-05-02 00:56:02',
                'updated_at' => '2017-05-02 00:56:02',
            ),
            22 => 
            array (
                'id' => 24,
                'title' => 'Well + Good',
                'link' => 'http://www.wellandgood.com/good-looks/healthy-vacation-packing-guide/',
                'slug' => 'well-good-1',
                'date' => '2016-05-01 00:05:00',
                'created_at' => '2017-05-02 00:56:58',
                'updated_at' => '2017-05-02 00:56:58',
            ),
            23 => 
            array (
                'id' => 25,
                'title' => 'GQ Magazine',
                'link' => 'http://www.gqindia.com/live-well/travel/escape-to-these-fitness-resorts-for-a-refreshingly-healthy-holiday/#escape-to-shape',
                'slug' => 'gq-magazine',
                'date' => '2016-05-01 00:05:00',
                'created_at' => '2017-05-02 00:57:53',
                'updated_at' => '2017-05-02 00:57:53',
            ),
            24 => 
            array (
                'id' => 26,
                'title' => 'Charlotte\'s Book',
                'link' => 'https://www.charlottesbook.com/20160503-spa-detox-fitness-resort-best-of/',
                'slug' => 'charlotte-s-book-1',
                'date' => '2016-05-01 00:05:00',
                'created_at' => '2017-05-02 00:59:28',
                'updated_at' => '2017-05-02 00:59:28',
            ),
            25 => 
            array (
                'id' => 27,
                'title' => 'Yahoo Beauty',
                'link' => 'https://www.yahoo.com/beauty/how-to-find-the-right-1426746051584054.html',
                'slug' => 'yahoo-beauty-1',
                'date' => '2016-05-01 00:05:00',
                'created_at' => '2017-05-02 01:00:40',
                'updated_at' => '2017-05-02 01:00:40',
            ),
            26 => 
            array (
                'id' => 28,
                'title' => 'Boston Herald',
                'link' => 'http://www.bostonherald.com/lifestyle/health/2016/01/recharge_with_a_vacation_centered_on_diet_exercise',
                'slug' => 'boston-herald',
                'date' => '2016-01-01 00:01:00',
                'created_at' => '2017-05-02 01:04:18',
                'updated_at' => '2017-05-02 01:04:18',
            ),
            27 => 
            array (
                'id' => 29,
                'title' => 'New York Times',
                'link' => 'https://www.nytimes.com/2015/06/21/travel/expanding-fitness-travel-options.html?_r=1',
                'slug' => 'new-york-times',
                'date' => '2015-06-01 00:06:00',
                'created_at' => '2017-05-02 01:08:53',
                'updated_at' => '2017-05-02 01:08:53',
            ),
            28 => 
            array (
                'id' => 30,
                'title' => 'AFAR',
                'link' => 'http://www.afar.com/magazine/how-to-pick-a-yoga-retreat',
                'slug' => 'afar',
                'date' => '2015-05-01 00:05:00',
                'created_at' => '2017-05-02 01:09:46',
                'updated_at' => '2017-05-02 01:09:46',
            ),
            29 => 
            array (
                'id' => 31,
                'title' => 'CLASS-IFIELDS',
                'link' => 'http://blog.classpass.com/2015/04/28/theres-no-place-like-om-7-amazing-yoga-retreats/',
                'slug' => 'class-ifields',
                'date' => '2015-05-01 00:05:00',
                'created_at' => '2017-05-02 01:11:29',
                'updated_at' => '2017-05-02 01:11:29',
            ),
            30 => 
            array (
                'id' => 33,
                'title' => 'Vogue',
                'link' => 'http://www.vogue.com/article/body-trip-eight-slightly-fanatical-fitness-vacations',
                'slug' => 'vogue',
                'date' => '2013-04-01 00:04:00',
                'created_at' => '2017-05-02 01:19:38',
                'updated_at' => '2017-05-02 01:19:38',
            ),
            31 => 
            array (
                'id' => 34,
                'title' => 'Self',
                'link' => 'http://www.self.com/life/travel/2014/08/stay-shape-vacations-wont-want-leave/',
                'slug' => 'self',
                'date' => '2015-01-01 00:01:00',
                'created_at' => '2017-05-02 01:25:58',
                'updated_at' => '2017-05-02 16:43:32',
            ),
            32 => 
            array (
                'id' => 35,
                'title' => 'AFAR',
                'link' => NULL,
                'slug' => 'afar-1',
                'date' => '2016-01-01 00:01:00',
                'created_at' => '2017-05-02 16:31:58',
                'updated_at' => '2017-05-02 16:31:58',
            ),
            33 => 
            array (
                'id' => 36,
                'title' => 'St. Louis Magazine',
                'link' => NULL,
                'slug' => 'st-louis-magazine',
                'date' => '2016-01-01 00:01:00',
                'created_at' => '2017-05-02 16:39:13',
                'updated_at' => '2017-05-02 16:39:13',
            ),
            34 => 
            array (
                'id' => 37,
                'title' => 'Prevention Magazine',
                'link' => NULL,
                'slug' => 'prevention-magazine',
                'date' => '2016-01-01 00:01:00',
                'created_at' => '2017-05-02 16:40:19',
                'updated_at' => '2017-05-02 16:40:19',
            ),
            35 => 
            array (
                'id' => 38,
                'title' => 'Votre Beaute',
                'link' => NULL,
                'slug' => 'votre-beaute',
                'date' => '2014-06-01 00:06:00',
                'created_at' => '2017-05-02 16:44:50',
                'updated_at' => '2017-05-02 16:44:50',
            ),
            36 => 
            array (
                'id' => 39,
                'title' => 'AFAR',
                'link' => NULL,
                'slug' => 'afar-2',
                'date' => '2013-01-01 00:01:00',
                'created_at' => '2017-05-02 16:46:28',
                'updated_at' => '2017-05-02 16:46:28',
            ),
            37 => 
            array (
                'id' => 40,
                'title' => 'Conde Nast Traveller | Spa Guide',
                'link' => NULL,
                'slug' => 'conde-nast-traveller-spa-guide',
                'date' => '2013-03-01 00:03:00',
                'created_at' => '2017-05-02 16:48:14',
                'updated_at' => '2017-05-02 16:48:14',
            ),
            38 => 
            array (
                'id' => 41,
                'title' => 'Lonely Planet | Best In Travel',
                'link' => NULL,
                'slug' => 'lonely-planet-best-in-travel',
                'date' => '2013-11-01 00:11:00',
                'created_at' => '2017-05-02 16:49:53',
                'updated_at' => '2017-05-02 16:49:53',
            ),
            39 => 
            array (
                'id' => 42,
                'title' => 'Page Six',
                'link' => NULL,
                'slug' => 'page-six',
                'date' => '2009-09-01 00:09:00',
                'created_at' => '2017-05-02 16:52:05',
                'updated_at' => '2017-05-02 16:52:05',
            ),
            40 => 
            array (
                'id' => 43,
                'title' => 'Vogue',
                'link' => NULL,
                'slug' => 'vogue-1',
                'date' => '2009-01-01 00:01:00',
                'created_at' => '2017-05-02 16:53:18',
                'updated_at' => '2017-05-02 16:53:18',
            ),
            41 => 
            array (
                'id' => 44,
                'title' => 'Lucky',
                'link' => NULL,
                'slug' => 'lucky',
                'date' => '2012-05-01 00:05:00',
                'created_at' => '2017-05-02 16:54:43',
                'updated_at' => '2017-05-02 16:54:43',
            ),
            42 => 
            array (
                'id' => 45,
                'title' => 'Marie Claire',
                'link' => NULL,
                'slug' => 'marie-claire',
                'date' => '2012-04-01 00:04:00',
                'created_at' => '2017-05-02 16:56:35',
                'updated_at' => '2017-05-02 16:56:35',
            ),
            43 => 
            array (
                'id' => 46,
                'title' => 'Departures',
                'link' => 'http://www.departures.com/blogs/fitness-travel/wellness-weekend-surf-lodge',
                'slug' => 'departures-1',
                'date' => '2012-09-01 00:09:00',
                'created_at' => '2017-05-02 16:58:04',
                'updated_at' => '2017-05-02 16:58:04',
            ),
            44 => 
            array (
                'id' => 47,
                'title' => 'Forbes',
                'link' => 'http://www.forbes.com/sites/hannahelliott/2012/10/04/in-montauk-escaping-to-shape-up/',
                'slug' => 'forbes',
                'date' => '2012-10-01 00:10:00',
                'created_at' => '2017-05-02 17:03:04',
                'updated_at' => '2017-05-02 17:03:04',
            ),
            45 => 
            array (
                'id' => 48,
                'title' => 'New York Time | Style Section',
                'link' => 'http://www.nytimes.com/2013/01/10/fashion/the-new-mantra-replacing-om-with-glam.html?_r=1&',
                'slug' => 'new-york-time-style-section',
                'date' => '2013-01-01 00:01:00',
                'created_at' => '2017-05-02 17:03:55',
                'updated_at' => '2017-05-02 17:03:55',
            ),
            46 => 
            array (
                'id' => 49,
                'title' => 'Well + Good | The Coolest Fitness Getaways',
                'link' => 'http://wellandgood.com/2014/07/11/the-coolest-fitness-getaways-late-summer-edition/',
                'slug' => 'well-good-the-coolest-fitness-getaways',
                'date' => '2014-07-01 00:07:00',
                'created_at' => '2017-05-02 17:14:42',
                'updated_at' => '2017-05-02 17:14:42',
            ),
        ));
        
        
    }
}