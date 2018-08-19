<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $erica = [
            'name' => 'Erica Gragg',
            'bio' => 'Erica is an acclaimed yoga teacher, known for teaching a very strong, yet playful Vinyasa flow practice. She is largely inspired by the journey of yoga, the subtle to the grand discoveries each individual makes through their practice, inviting students to have fun while experiencing their body in a whole new way through each unique practice. With classes always set to music, from tribal, to lounge to classic rock songs, students are able to find their own personal rhythm and expression through each asana. Additionally, Erica contributes to AFAR, Huffington Post, Livetheprocess.com, Charlottesbook.com and has created time efficient and results driven workouts and fitness tips for publications such as Health, Self, Shape, Fitness, The New York Post, Newsday as well as Red, The London Times, Daily Star, The Sunday Express and Healthy in the United Kingdom.',
            'credentials' => 'Yoga Teacher'
        ];
        App\TeamMember::create($erica);
        $alicia = [
            'name' => 'Alica Wyatt',
            'bio' => 'Alisa has been teaching Pilates since 1999 when she left her high-powered publishing job to spread her passion for Pilates. Recognizing a need to preserve Joseph Pilates’ original style of teaching, she and her husband Jack created Pilatesology, a website dedicated to spreading Joe’s traditional work worldwide. She’s an often a featured expert for Pilates Style Magazine and is the creator of a series of acclaimed Pilates videos: Beginner, Intermediate, and Advanced Pilates Workout and Pilates for Men, as well as a sought-after presenter at fitness conferences.A Pilates purist, Alisa was trained and certified by Pilates legend, Romana Kryzanowska, in New York City where she ran a highly successful studio for a decade before moving home to California. A believer in learning from the source, Alisa has sought out training from those who were trained by Mr. Pilates himself. She studied with the late Kathy Grant in New York and currently trains with one of the few remaining teachers who worked for Mr. Pilates: Jay Grimes.When she’s not traveling the globe filming classes with world-renowned instructors for Pilatesology, Alisa spends her time in Hermosa Beach, CA, where she and Jack get outside as much as possible- surfing, hiking and playing. Alisa believe that Pilates is what allows them to lead active, healthy lives.Alisa’s client list includes Olympic athletes, supermodels and real people who want to look and perform at their absolute best. Pilates with Alisa is a personalized, vigorous, whole body workout that creates a long, lean, balanced physique.Alisa has traveled with Escape To Shape to Cartagena, Colombia, Todos Santos, Mexico & Marrakech, Morocco in the past and we are honored to have Alisa sharing her gifts with us again while in Italy.',
            'credentials' => 'Pilates'
        ];
        App\TeamMember::create($alicia);
        $teddi = [
            'name' => 'Teddi Bryant',
            'bio' => 'Teddi Bryant has over 25 years of private and group training experience in NYC, San Francisco, Miami and Mexico and is certified through the prestigious ACSM, NASM, EFTI, Special Populations, Pre/Post Natal, among others. Teddi is the owner & founder of Hot Mamas Exercise in Denver, Colorado and creator of her own training method, NAKED.NAKED is an incredibly fun class, with Teddi B’s signature playlists, designed to work the entire body using multiple disciplines of dance, martial arts, Pilates & yoga. NAKED is effective, challenging and non-stop but is created for all fitness levels. No two workouts are ever alike. The concept comes from Teddi’s years of research working with athletes, runway models and regular people alike. And made her realize that what people really want is a pared down workout that uses nothing but your body weight and can be done anywhere. And really, at the end of the day, who doesn’t want to look good naked?Teddi’s classes have been listed as one of the top workouts in Denver and has been featured in Vogue, Shape, Travel & Leisure, Fitness, and Cooking Light. She has two DVD’s as well: Hot Mamas Exercise Pre & Post Natal Conditioning. In her spare time, she is a mother of two and a DJ.'
        ];
        App\TeamMember::create($teddi);
        $erika = [
            'name' => 'Erika Laurion',
            'credentials' => 'Master in Sciences, Certified Nutritionist Specialist, Certified Dietician Nutritionist and Chef',
            'bio' => '<p>Erika Laurion, MS, CNS, CDN has worked in the health fields for over 10 years. She received her Masters from the Institute of Human Nutrition at the College of Physicians and Surgeons of Columbia University. Erika is a Licensed Certified Nutritionist and will help you achieve your personal health goals by improving your overall diet and your food choices. Erika has a lot of experience in teaching how cooking can be simple, healthy and sustainable. No two people are the same, so why would their diets be? Erika will customize a plan that fits your lifestyle and dietary habits without deprivation or unrealistic goals. This will begin with an initial consultation where she we will go over your medical, dietary and family history. Together, through Destination Detox: Hudson, NY you will develop a game plan including your food preferences and lifestyle.</p>
            <p>Additionally, Erika oversees the Destination Detox menu & kitchen in order to create a thoughtful, results- driver menu, combining a raw food & juice cleanse with seasonal, organic, unrefined local whole foods that nourish the body from the inside out while satisfying the palette.</p>'
        ];
        App\TeamMember::create($erika);
        $nicole = [
            'name' => 'Nicole Keegan',
            'credentials' => 'Pilates &amp; Yoga',
            'bio' => '<p>Originally from Southern Kentucky, Nicole Meadors opened Pilates Hudson in June 2004. At seven years old, Nicole is featured hanging upside down in her father’s textbook, LET’S MOVE.</p><p>Nicole teaches in Hudson NY and at West Village Yoga NYC. She travels with Escape to Shape, working in locations like Marrakech, Cartagena, Puglia and Bali.</p><p>In the late 90’s Nicole was the Associate Director of Upstate Films, an art house cinema in Rhinebeck NY; she taught play writing at the Bardavon Opera House in Poughkeepsie NY. She served as film program director at Time & Space Limited in Hudson, NY, where she coordinated an Appalachian Film Festival. A freelance writer, Nicole began her Pilates training in 1998 to supplement her career. She’s practiced Pilates as a student and as a teacher for fourteen years.</p><p>Certified to teach Classical Pilates and Yoga, Nicole continues to study and collaborate with movement professionals such as Kinesthetic Anatomist Irene Dowd, Alycea Ungaro, Steve Giordano, Susan Moran, and Iyengar Yoga teachers Kevin Gardiner and Kofi Busia. Nicole incorporates bodywork similar to Thai Massage and adheres to a system that nourishes mind, body, and spirit, ideal for the Destination Detox: Hudson, NY experience.</p>',
        ];
        App\TeamMember::create($nicole);
        $kylah = [
            'name' => 'Kylah Campeta',
            'credentials' => 'ATC, Personal Trainer',
            'bio' => '<p>Founder Kylah Campeta ATC has been a personal strength and conditioning coach for 8 years in Los Angeles, Manhattan and the Hudson Valley. She is a graduate from the American Musical and Dramatic Academy where she studied dance and movement and has a Sports Medicine Degree in Athletic Training from Marist College.</p>
            <p>Kylah is certified in Athletic training, pre/post natal training, boxing, spin, TRX, stretching and dance/movement. Her style and technique is based on the individual, her workouts combine muscular strength, cardiovascular endurance, plyometrics and flexibility into one so the body receives a healthy full-body workout.</p>
            <p>Kylah uses anything from free weights to simply your own body weight to put together a custom routine that accommodates all fitness levels and body types. She has extensive post-injury training experience and a background in physical therapy for athletes, hence, safety is always a first priority.</p>'
        ];
        App\TeamMember::create($kylah);
        $meghan = [
            'name' => 'Meghan Lee',
            'credentials' => 'NASM Certified – Personal training, Corrective Exercise and Sports Performance training, Certified Yoga and Pilates Mat Instructor, Master Nalini Method Instructor',
            'bio' => '<p>Meghan Lee is a Fitness Professional of 10 years who is known for her stimulating, energetic, client focused workouts that implement her ‘smarter-before-harder’ training techniques which motivate and support you in every step of your journey. Most notable for her time as a Master Nalini Method Instructor at Nalini Method, she taught classes for 5 years, created programming and workshops, volunteered with Nalinikids teaching kids fitness through the One Word project, and was one of Lululemon’s Ambassadors of 2012.</p><p>Meg is NASM certified in Personal training, Corrective Exercise and Sports Performance training. She is also a certified Yoga and Pilates mat instructor, with hands on experience in, prenatal/postnatal, post injury rehab, chronic tightness and pain, as well as a solid range of health and orthopedic issues. Her extensive group class experience has helped her cultivate a class setting designed to accommodate all levels – from the seasoned athlete to the novice beginner – generating a memorable mind/body connection and personal challenge, improved cardiovascular and muscular endurance, strength, balance, flexibility, and core stability. No matter what personal obstacles you face, Meghan will help you explore how to get the most out of your training and how to bring home the “shape experience” to your everyday lifestyle.</p><p>Recently, Meg has returned her focus to her own private training business in NYC and Brooklyn and she is thrilled to be joining the Escape To Shape team on their Destination Detox!</p>'
        ];
        App\TeamMember::create($meghan);
    }

}
