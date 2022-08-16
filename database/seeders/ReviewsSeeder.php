<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => '2',
            'service_id' => '1',
            'review' => 'Verry nice',
            'rating' => '5',
        ]);
        DB::table('reviews')->insert([
            'user_id' => '5',
            'service_id' => '2',
            'review' => 'This is sample review',
            'rating' => '4',
        ]);
        DB::table('reviews')->insert([
            'user_id' => '4',
            'service_id' => '2',
            'review' => 'This is sample review',
            'rating' => '2',
        ]);
        DB::table('reviews')->insert([
            'user_id' => '3',
            'service_id' => '2',
            'review' => 'This is sample review',
            'rating' => '1',
        ]);
        DB::table('reviews')->insert([
            'user_id' => '3',
            'service_id' => '4',
            'review' => 'This is sample review',
            'rating' => '1',
        ]);
    }
}
