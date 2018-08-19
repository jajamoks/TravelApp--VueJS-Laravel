<?php

use Illuminate\Database\Seeder;

class TaggableTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taggable_tags')->delete();
        
        \DB::table('taggable_tags')->insert(array (
            0 => 
            array (
                'tag_id' => 1,
                'name' => 'Tips',
                'normalized' => 'tips',
                'created_at' => '2017-05-07 22:54:16',
                'updated_at' => '2017-05-07 22:54:16',
            ),
            1 => 
            array (
                'tag_id' => 2,
                'name' => 'Yoga',
                'normalized' => 'yoga',
                'created_at' => '2017-05-07 22:54:16',
                'updated_at' => '2017-05-07 22:54:16',
            ),
            2 => 
            array (
                'tag_id' => 3,
                'name' => 'Healthy Eating',
                'normalized' => 'healthy eating',
                'created_at' => '2017-05-07 22:54:16',
                'updated_at' => '2017-05-07 22:54:16',
            ),
            3 => 
            array (
                'tag_id' => 4,
                'name' => 'Hiking',
                'normalized' => 'hiking',
                'created_at' => '2017-05-17 18:26:52',
                'updated_at' => '2017-05-17 18:26:52',
            ),
            4 => 
            array (
                'tag_id' => 5,
                'name' => 'Fitness Training',
                'normalized' => 'fitness training',
                'created_at' => '2017-05-17 18:26:52',
                'updated_at' => '2017-05-17 18:26:52',
            ),
            5 => 
            array (
                'tag_id' => 6,
                'name' => 'Lots of Walking',
                'normalized' => 'lots of walking',
                'created_at' => '2017-05-17 18:31:03',
                'updated_at' => '2017-05-17 18:31:03',
            ),
            6 => 
            array (
                'tag_id' => 7,
                'name' => 'Power Walks',
                'normalized' => 'power walks',
                'created_at' => '2017-05-17 18:33:15',
                'updated_at' => '2017-05-17 18:33:15',
            ),
            7 => 
            array (
                'tag_id' => 8,
                'name' => 'Biking',
                'normalized' => 'biking',
                'created_at' => '2017-05-17 18:35:41',
                'updated_at' => '2017-05-17 18:35:41',
            ),
            8 => 
            array (
                'tag_id' => 9,
                'name' => 'Horse-riding',
                'normalized' => 'horse-riding',
                'created_at' => '2017-05-17 18:35:41',
                'updated_at' => '2017-05-17 18:35:41',
            ),
        ));
        
        
    }
}