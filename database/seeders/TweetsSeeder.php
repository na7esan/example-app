<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tweet;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tweet::factory()->count(10)->create()->each(fn($tweet)=>
            Image::factory()->count(4)->create()->each(fn($image)=>
                $tweet->images()->attach($image->id)
            )
        );
    }
}
