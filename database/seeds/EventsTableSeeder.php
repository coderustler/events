<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            
            'title' => "82nd Floor Lan Drops",
            'description' => "Pull lan data drops from MDF-1 to IDF-82",
            'start' => "2018-3-1",
            'end' => "2018-3-3",
            'backgroundColor' => '#ff0000',
        ]);

        DB::table('events')->insert([
            
            'title' => "81st Floor Lan Drops",
            'description' => "Pull lan data drops from MDF-1 to IDF-81",
            'start' => "2018-3-5",
            'end' => "2018-3-7",
            'backgroundColor' => '#ff0000',
        ]);

        DB::table('events')->insert([
            
            'title' => "80th Floor Lan Drops",
            'description' => "Pull lan data drops from MDF-1 to IDF-80",
            'start' => "2018-3-7",
            'end' => "2018-3-9",
            'backgroundColor' => '#ff0000',
        ]);

        DB::table('events')->insert([
            
            'title' => "Receive Cable Order",
            'description' => "Have manpower available to receive 120 spools of cable",
            'start' => "2018-3-8",
            'end' => "2018-3-9",
            'backgroundColor' => '#008000',
        ]);

        DB::table('events')->insert([
            
            'title' => "Terminate 80-82",
            'description' => "Terminate drops at MDF-1 to IDF-80-82",
            'start' => "2018-3-8",
            'end' => "2018-3-10",
            'backgroundColor' => '#ff8000',
        ]);
       
    }
}
