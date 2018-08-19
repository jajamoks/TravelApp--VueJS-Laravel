<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(TeamMemberSeeder::class);
        $this->call(CambodiaSeeder::class);
        $this->call(MarakeeshSeeder::class);
        $this->call(LakeComoSeeder::class);
        $this->call(BhutanSeeder::class);
        $this->call(CartegnaSeeder::class);
        $this->call(ChileSeeder::class);
        $this->call(MediableMediaTableSeeder::class);
        $this->call(MediableMediablesTableSeeder::class);
        $this->call(PressTableSeeder::class);
        $this->call(TaggableTagsTableSeeder::class);
        $this->call(TaggableTaggablesTableSeeder::class);
    }
}
