<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BlogSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Blog Categories
        $category1 = App\PostCategory::create([
            'title' => 'Travel Tips'
        ]);

        $category2 = App\PostCategory::create([
            'title' => 'Past Escapes'
        ]);

        //create posts and save to category
        $posts = factory(App\Post::class, 100)->make();
        $i = 1;
        $posts->each(function ($p) use (&$i) {
            $p->published_date = Carbon::parse("-$i week");
            $p->user_id = 2;
            $i++;
        });

        $category1->posts()->saveMany($posts->take(50));
        $category2->posts()->saveMany($posts->take(-50));

        //tag the posts
        $posts->each(function ($p) {
            $p->tag(['Tips', 'Yoga', 'Healthy Eating']);
        });
    }
}
