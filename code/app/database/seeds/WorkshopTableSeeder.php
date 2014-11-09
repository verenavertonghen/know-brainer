<?php

class WorkshopTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kb_workshops')->delete();

        Workshop::create(array('title' => 'foobar lesson',
            'description' => 'foobar',
            'location' => 'beetlegeuse',
            'start_date' => DateTime::createFromFormat('d-m-Y H:i','10-12-2014 12:00'),
            'end_date' => DateTime::createFromFormat('d-m-Y H:i','10-12-2014 15:00'),
            'subscribers_amount' => '15'));
    }

}
